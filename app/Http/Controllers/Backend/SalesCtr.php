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
use DB;

class SalesCtr extends Controller
{
    public function Create(Request $request)
    {

        $product_variant_id = json_encode($request->product_variant_id);

        // get sale by user id
        $saleIds = Sale::where('user_id', Auth::user()->id)->first();
        if (!$saleIds) {
            // jika array kosong jadi membuat 1 sale dan 1 sale detail
            $sales = new Sale();
            $sales->user_id = Auth::user()->id;
            $sales->date = date('Y-m-d H:i:s');
            $sales->save();

            $dataProduct =  Product::with('variants')->find($request->product_id);

            $salesDetail = new SaleDetail();
            $salesDetail->total = ($dataProduct->price + $dataProduct->TaxNet) - $dataProduct->discount;
            $salesDetail->sale_id = $sales->id;
            $salesDetail->quantity = $request->qty;
            $salesDetail->product_id = $dataProduct->id;
            $salesDetail->product_variant_id = $product_variant_id;
            $salesDetail->price = $dataProduct->price;
            $salesDetail->imei_number = $dataProduct->imei_number;
            $salesDetail->TaxNet = $dataProduct->TaxNet;
            $salesDetail->discount = $dataProduct->discount;
            $salesDetail->save();

            $sales->GrandTotal = $salesDetail->total * $salesDetail->quantity;
            $sales->payment_statut = "Belum Bayar";
            $sales->statut = "Belum Bayar";
            $sales->save();

            return response()->json([
                'message' => 'Sale created successfully',
                'data' => $sales,
            ]);
        } else {

            // jika array tidak kosong
            // Ambil semua SaleDetail yang terkait dengan Sale yang memiliki id dalam array $saleIds
            $saleDetailById = SaleDetail::where('sale_id', $saleIds->id)->get();
            $product_variant_id = json_encode($request->product_variant_id);


            foreach ($saleDetailById as $saleDetail) {
                $productVariants = $saleDetail->product_variant_id;

                if ($productVariants === $product_variant_id) {
                    // jika product variantnya sama 
                    $dataProduct =  Product::with('variants')->find($request->product_id);

                    $salesDetail = SaleDetail::find($saleDetail->id);
                    $salesDetail->quantity = $saleDetail->quantity + $request->qty;
                    $salesDetail->save();

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
    }

    public function salesDetail()
    {

        $data = Sale::with('details')->where('user_id', Auth::user()->id)->get();
        return response()->json([
            'message' => 'Get data successfully',
            'data' => $data,
        ]);
    }
}