<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantOption;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use File;

class SalesCtr extends Controller
{
    public function Create(Request $request)
    {

        $product_variant_id = json_encode($request->product_variant_id);

        // totalAdditionalPrice
        $totalAdditionalPrice = DB::table('product_variants')
            ->whereIn('id', $request->product_variant_id)
            ->sum('additional_price');

        // get sale by user id
        // $saleIds = Sale::where('user_id', Auth::user()->id)->first();
        // dd(Auth::user()->id);
        $saleIds = Sale::where('user_id', Auth::user()->id)
            ->where('statut', '=', 'unpaid')
            ->first();
        // return $saleIds;
        if (!$saleIds) {
            // return 12;

            // jika array kosong jadi membuat 1 sale dan 1 sale detail
            $sales = new Sale();
            $sales->user_id = Auth::user()->id;
            $sales->date = date('Y-m-d H:i:s');
            $sales->save();

            $dataProduct =  Product::with('variants')->find($request->product_id);

            foreach ($request->product_variant_id as $variants) {
                $productVariantById = ProductVariant::find($variants);
                $salesDetail = new SaleDetail();
                $salesDetail->total = ($dataProduct->price + $dataProduct->TaxNet + $productVariantById->additional_price) - $dataProduct->discount;
                $salesDetail->total_price_item = ($dataProduct->price + $productVariantById->additional_price);
                $salesDetail->sale_id = $sales->id;
                $salesDetail->index = 1;
                $salesDetail->quantity = $request->qty;
                $salesDetail->product_id = $dataProduct->id;
                $salesDetail->product_variant_id = $variants; // diambil dari looping variants
                $salesDetail->price = $dataProduct->price;
                $salesDetail->imei_number = $dataProduct->imei_number ?? null;
                $salesDetail->TaxNet = $dataProduct->TaxNet;
                $salesDetail->discount = $dataProduct->discount;
                $salesDetail->save();
            }

            $grandTotal = DB::table('sales')
                ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
                ->where('sales.id', '=', $sales->id)
                ->selectRaw('SUM(sale_details.total * sale_details.quantity) as totalXQty')
                ->value('totalXQty');

            $sales->GrandTotal = $grandTotal;
            $sales->payment_statut = "unpaid";
            $sales->statut = "unpaid";
            $sales->save();

            return response()->json([
                'message' => 'Sale created successfully',
                'data' => $sales,
            ]);
        } else {
            return 1;

            // jika array tidak kosong
            // Ambil semua SaleDetail yang terkait dengan Sale yang memiliki id dalam array $saleIds
            // $saleDetailById = SaleDetail::where('sale_id', $saleIds->id)->get();
            // $saleDetailById = SaleDetail::where('sale_id', $saleIds->id)
            //     ->pluck('product_variant_id')
            //     ->map(function ($value) {
            //         return (int) $value;
            //     })
            //     ->toArray();
            $saleDetailsGrouped = SaleDetail::orderBy('created_at')
                ->get()
                ->groupBy(function ($detail) {
                    return $detail->created_at->format('Y-m-d H:i:s'); // Mengelompokkan berdasarkan tanggal, jam, dan detik created_at
                })
                ->values();
            // return $saleDetailsGrouped[1];



            // return $productVariantIdsArray;
            // old// 

            $saleDetailById = SaleDetail::where('sale_id', $saleIds->id)->get();
            // $productVariantIds = $saleDetailById->pluck('product_variant_id')->toArray();
            $productVariantIds = array_map('intval', $saleDetailById->pluck('product_variant_id')->toArray());
            // return $productVariantIds;
            // old// 


            $productVariantIdsGrouped = $saleDetailsGrouped->map(function ($group) {
                return $group->pluck('product_variant_id')->map(function ($id) {
                    return (int) $id;
                })->toArray();
            });
            $productVariantIdsArray = $productVariantIdsGrouped->values()->toArray();
            // return $productVariantIdsArray;
            $product_variant_id = $request->product_variant_id;

            $isProductVariantIdMatched = false;

            // Loop melalui setiap SaleDetail
            $matchedIds = ''; // Array untuk menyimpan ID yang cocok

            foreach ($productVariantIdsArray as $index => $saleDetail) {
                // return $index;
                // Memeriksa jika product_variant_id sama dengan nilai yang diinginkan
                if ($saleDetail == $product_variant_id) {
                    $matchedIds = $index;
                    // Jika ditemukan, atur variabel pengecekan menjadi true dan keluar dari loop
                    $isProductVariantIdMatched = true;
                    break;
                }
            }
            // return $matchedIds;


            // Jika ada yang cocok, $matchedIds akan berisi ID yang sesuai
            if (!empty($matchedIds)) {
                // Lakukan apa pun yang perlu Anda lakukan dengan $matchedIds
                // Misalnya, mencetaknya atau menggunakan data tersebut untuk tujuan lain
                // print_r($matchedIds);
                // return $matchedIds;
                return $productVariantIdsArray[$matchedIds];
            } else {
                // Penanganan jika tidak ada yang cocok
                // Misalnya, pengembalian respons atau tindakan lainnya
            }
            // foreach ($productVariantIdsArray as $saleDetail) {
            //     // return $product_variant_id;
            //     return $saleDetail;

            //     // Memeriksa jika product_variant_id sama dengan nilai yang diinginkan
            //     if ($productVariantIds == $product_variant_id) {
            //         return 1;
            //         // Jika ditemukan, atur variabel pengecekan menjadi true dan keluar dari loop
            //         $isProductVariantIdMatched = true;
            //         break;
            //     }
            // }

            // Melakukan pengecekan hasil
            if ($isProductVariantIdMatched) {

                //  "Product variant ID ditemukan!";
                $dataProduct =  Product::with('variants')->find($request->product_id);

                // looping setiap sale detail nya 
                foreach ($saleDetailById as $saleDetails) {
                    // return $saleDetails->id;
                    $salesDetail = SaleDetail::find($saleDetails->id);
                    $salesDetail->quantity = $saleDetail->quantity + $request->qty;
                    $salesDetail->save();
                }

                $grandTotal = DB::table('sales')
                    ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
                    ->where('sales.id', '=', $saleIds->id)
                    ->selectRaw('SUM(sale_details.total * sale_details.quantity) as totalXQty')
                    ->value('totalXQty');
                $saleIds->GrandTotal = $grandTotal;
                $saleIds->save();


                return response()->json([
                    'message' => 'Sale created successfully',
                    'data' => $saleIds,
                ]);
            } else {
                return 3;
                //  "Product variant ID tidak ditemukan!";

                $dataProduct =  Product::with('variants')->find($request->product_id);

                foreach ($request->product_variant_id as $variants) {
                    $productVariantById = ProductVariant::find($variants);
                    $salesDetail = new SaleDetail();
                    $salesDetail->total = ($dataProduct->price + $dataProduct->TaxNet + $productVariantById->additional_price) - $dataProduct->discount;
                    $salesDetail->total_price_item = ($dataProduct->price + $productVariantById->additional_price);
                    $salesDetail->sale_id = $sales->id;
                    $salesDetail->quantity = $request->qty;
                    $salesDetail->product_id = $dataProduct->id;
                    $salesDetail->product_variant_id = $variants; // diambil dari looping variants
                    $salesDetail->price = $dataProduct->price;
                    $salesDetail->imei_number = $dataProduct->imei_number ?? null;
                    $salesDetail->TaxNet = $dataProduct->TaxNet;
                    $salesDetail->discount = $dataProduct->discount;
                    $salesDetail->save();
                }
                // $salesDetail = new SaleDetail();
                // $salesDetail->total = ($dataProduct->price + $dataProduct->TaxNet) - $dataProduct->discount;
                // $salesDetail->total_price_item = ($dataProduct->price + $totalAdditionalPrice);
                // $salesDetail->sale_id = $saleIds->id;
                // $salesDetail->quantity = $request->qty;
                // $salesDetail->product_id = $dataProduct->id;
                // $salesDetail->product_variant_id = $product_variant_id;
                // $salesDetail->price = $dataProduct->price;
                // $salesDetail->imei_number = $dataProduct->imei_number ?? null;
                // $salesDetail->TaxNet = $dataProduct->TaxNet;
                // $salesDetail->discount = $dataProduct->discount;
                // $salesDetail->save();

                $grandTotal = DB::table('sales')
                    ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
                    ->where('sales.id', '=', $saleIds->id)
                    ->selectRaw('SUM(sale_details.total * sale_details.quantity) as totalXQty')
                    ->value('totalXQty');
                $saleIds->GrandTotal = $grandTotal;
                $saleIds->save();

                return response()->json([
                    'message' => 'Sale created successfully',
                    'data' => $saleIds,
                ]);
            }
        }
    }

    public function salesDetail()
    {

        $data = Sale::with('details', 'details.product')
            ->where('user_id', Auth::user()->id)
            ->withSum('details as total_price_items', 'total_price_item')
            ->get();

        $data->transform(function ($sale) {
            $sale->details->transform(function ($detail) {
                // Pastikan bahwa image sudah memiliki prefix yang benar sebelum menambahkan prefix tambahan
                if (!Str::startsWith($detail->product->image, 'http')) {
                    $detail->product->image = asset("images/products/{$detail->product->image}");
                }
                return $detail;
            });
            return $sale;
        });

        // Mendapatkan data varian berdasarkan product_variant_id yang ada di setiap detail
        foreach ($data as $sale) {
            foreach ($sale->details as $detail) {
                $productVariantIds = json_decode($detail->product_variant_id);

                $variants = ProductVariant::whereIn('id', $productVariantIds)->where('product_id', '=', $detail->product_id)->get();

                // Menambahkan data varian ke dalam detail
                $detail->variants = $variants;
            }
        }
        return response()->json([
            'message' => 'Get data successfully',
            'data' => $data,
        ]);
    }
}