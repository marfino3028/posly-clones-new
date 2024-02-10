<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PurchaseCart;
use App\Models\VariantAttribute;
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
        // dari variants relasi ke variant option lalu variant options relasi ke variant attributes ke variant attributes values 
        $product_details =Product::with('category', 'variants','variants.variant_option.variant_atrributes.variant_attributes_values','variants.variant_option','variants.variant_option.variant_atrributes')->where('id', $id)->first();
        $promoPrice = $product_details['promo_price'] ?? null;

        // Memeriksa kondisi dan menetapkan nilai promo_price menjadi NULL jika kondisi tidak terpenuhi
        if ($product_details && $product_details['is_promo'] == 1 && $product_details['promo_start_date'] <= date('Y-m-d') && $product_details['promo_end_date'] >= date('Y-m-d')) {
            // Kondisi promo berlaku, promo_price tetap seperti sebelumnya
        
        } else {
            // Kondisi promo tidak berlaku, set promo_price menjadi NULL
            $promoPrice = null;
        }

        $variants=VariantAttribute::with('attributeValue')->get();

        return response()->json([
            
            "promoPrice" => $promoPrice,
            "product_details" => $product_details,
            // "variants" => $variants,
        ], 200);
    }

    

}