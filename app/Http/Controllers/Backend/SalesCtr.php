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


        // get sale by user id
        // $saleIds = Sale::where('user_id', Auth::user()->id)->first();
        // dd(Auth::user()->id);
        $saleIds = Sale::where('user_id', Auth::user()->id)
            ->where('statut', '=', 'Belum Bayar')
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
            $sales->payment_statut = "Belum Bayar";
            $sales->statut = "Belum Bayar";
            $sales->save();

            return response()->json([
                'message' => 'Sale created successfully',
                'data' => $sales,
            ]);
        } else {

            // 1. Ambil seluruh data diurutkan berdasarkan index dan di-filter berdasarkan sale_id
            $data = DB::table('sale_details')
                ->where('sale_id', $saleIds->id)
                ->orderBy('index')
                ->get();

            // 2. Buat array dari gabungan product_variant_id untuk setiap index yang sama
            $combinedData = [];
            foreach ($data as $item) {
                $index = $item->index;
                $productVariantId = $item->product_variant_id;

                if (!isset($combinedData[$index])) {
                    $combinedData[$index] = [];
                }

                // Konversi product_variant_id menjadi integer
                $combinedData[$index][] = (int)$productVariantId;
            }
            // Memeriksa apakah ada cocok antara array dalam permintaan dan array yang Anda miliki
            $isProductVariantIdMatched = '';
            $match_index = '';
            foreach ($combinedData as $index => $variants) {
                if (count(array_intersect($request->product_variant_id, $variants)) === count($request->product_variant_id)) {
                    $isProductVariantIdMatched = true;
                    $match_index = $index;
                }
            }
            // // Melakukan pengecekan hasil
            if ($isProductVariantIdMatched) {

                $data = DB::table('sale_details')
                    ->where('sale_id', $saleIds->id)
                    ->get();

                foreach ($data as $item) {
                    DB::table('sale_details')
                        ->where('id', $item->id) // Sesuaikan dengan primary key yang tepat
                        ->update([
                            'quantity' => $item->quantity + $request->qty
                        ]);
                }

                $grandTotal = DB::table('sales')
                    ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
                    ->where('sales.id', '=', $saleIds->id)
                    ->groupBy('sale_details.index') // Mengelompokkan berdasarkan index
                    ->selectRaw('SUM(sale_details.total * sale_details.quantity) as totalXQty')
                    ->value('totalXQty');
                $saleIds->GrandTotal = $grandTotal;
                $saleIds->save();


                return response()->json([
                    'message' => 'Sale created successfully',
                    'data' => $saleIds,
                ]);
            } else {
                //  "Product variant ID tidak ditemukan!";
                $highestIndex = DB::table('sale_details')->where('sale_id',  $saleIds->id)
                    ->max('index');

                $dataProduct =  Product::with('variants')->find($request->product_id);

                foreach ($request->product_variant_id as $variants) {
                    $productVariantById = ProductVariant::find($variants);
                    $salesDetail = new SaleDetail();
                    $salesDetail->total = ($dataProduct->price + $dataProduct->TaxNet + $productVariantById->additional_price) - $dataProduct->discount;
                    $salesDetail->total_price_item = ($dataProduct->price + $productVariantById->additional_price);
                    $salesDetail->sale_id = $saleIds->id;
                    $salesDetail->index = $highestIndex + 1;
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
                    ->where('sales.id', '=', $saleIds->id)
                    ->groupBy('sale_details.index') // Mengelompokkan berdasarkan index
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
        return $data;

        // Mendapatkan data varian berdasarkan product_variant_id yang ada di setiap detail
        foreach ($data as $sale) {
            foreach ($sale->details as $detail) {

                $variants = ProductVariant::where('id', $detail->product_variant_id)->where('product_id', '=', $detail->product_id)->get();

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
