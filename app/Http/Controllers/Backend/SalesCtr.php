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


class SalesCtr extends Controller
{
    public function Create(Request $request)
    {   

        $products = $request->json('products')?? [];
        
        $sales= new Sale();
        $sales->user_id = Auth::user()->id;
        $sales->date = date('Y-m-d H:i:s');
        $sales->ref = $request->ref;
        $sales->save();

        $dataDetails=[];

        foreach($products as $product){

            $dataProduct =  Product::find($product['product_id']);
         
            $salesDetail= new SaleDetail();
            
            $salesDetail->total = ($dataProduct->price + $dataProduct->TaxNet )- $dataProduct->discount ;
            $salesDetail->sale_id = $sales->id;
            $salesDetail->product_id = $dataProduct->id;
            $salesDetail->product_variant_id = $product['product_variant_id'];
            $salesDetail->price = $dataProduct->price;
            $salesDetail->imei_number = $dataProduct->imei_number;
            $salesDetail->TaxNet = $dataProduct->TaxNet;
            $salesDetail->discount = $dataProduct->discount;
            $salesDetail->save();

            $dataDetails[]=$salesDetail->id;

        };
            $grandTotal = SaleDetail::whereIn('id', $dataDetails)->sum('total');
           //  sales detail menyimpan 1 product    
            // if untuk diskon atau tax yang berdasarkan persen nanti dibuat 
            // function nya juga dibuat 
            // nanti ditambah additional price juga 

            // updaate grand total di sales dia diambil dari total di sales detail 
            // sum semua berdasarkan user id nya dan status payment nya 
            $sales->GrandTotal = $grandTotal;
            $sales->payment_statut = "Belum Bayar";
            $sales->statut = "Belum Bayar";
            $sales->save();
             
        return response()->json([
            'message' => 'Sale created successfully',
            'data' => $sales,
        ]);
    }
}
