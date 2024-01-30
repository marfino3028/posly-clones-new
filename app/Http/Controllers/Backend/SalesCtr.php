<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SalesCtr extends Controller
{
    public function Create(Request $request)
    {   
        $products = $request->json('products')?? [];
        // $productDetails= $request->products ?? null;
        // dd($productDetails);
        
        // Product::whereIn([])

        foreach($products as $product){
            $dataProduct =  Product::find($product['product_id']);

            $productVariant= new ProductVariant();
            $productVariant->product_id = $product['product_id'];
            $productVariant->code = $dataProduct['name'];
            // $productVariant->save();
            // dd($productVariant);
            $productVariantOption= new ProductVariant();
            $productVariantOption->product_id = $productVariant['id'];
            $productVariantOption->product_variant_id = $productVariant['id'];

        };

        // products

       
        // $sales= new Sale();
        // $sales->user_id = $request->user_id;
        // $sales->date = date('Y-m-d H:i:s');
        // $sales->ref = $request->ref;
        // // $sales->client_id = $request->client_id;
        // // $sales->warehouse_id = $request->warehouse_id; // dari product 
        // // $sales->discount_type = $request->discount_type;
        // $sales->payment_statut = "Belum Bayar";
        // $sales->statut = "Belum Bayar";
        // $sales->save();


        return 1;
    }
}
