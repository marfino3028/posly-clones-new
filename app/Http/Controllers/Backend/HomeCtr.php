<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PurchaseCart;
use Illuminate\Http\Request;

class HomeCtr extends Controller
{
    public function index()
    {
            $categoryProducts= Category::select('id','name')->get();

            $products =Product::select('id','name','price','image','category_id')->with('category')->get();

            return response()->json([
                "products" => $products,
                "categoryProducts" => $categoryProducts,
            ], 200);
    }


    public function detail($id)
    {
        $product_details =Product::with('category')->where('id', $id)->first();
        $promoPrice = $product_details['promo_price'];

        // Memeriksa kondisi dan menetapkan nilai promo_price menjadi NULL jika kondisi tidak terpenuhi
        if ($product_details['is_promo'] == 1 && $product_details['promo_start_date'] <= date('Y-m-d') && $product_details['promo_end_date'] >= date('Y-m-d')) {
            // Kondisi promo berlaku, promo_price tetap seperti sebelumnya

        } else {
            // Kondisi promo tidak berlaku, set promo_price menjadi NULL
            $promoPrice = null;
        }

        $variants = ProductVariant::select('id','code','name')->where('attribute_id',  1)->get();
        $colors = ProductVariant::select('id','code','name')->where('attribute_id',  2)->get();
        return response()->json([
            
            "promoPrice" => $promoPrice,
            "product_details" => $product_details,
            "variants" => $variants,
            "colors" => $colors,
        ], 200);
    }

    

}