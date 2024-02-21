<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PurchaseCart;
use App\Models\VariantAttribute;
use Illuminate\Http\Request;
use DB;

class HomeCtr extends Controller
{
    public function index()
    {
        $categoryProducts = Category::select('id', 'name')->get();

        $products = Product::select('id', 'name', 'price', 'image', 'category_id')->with('category')->get();

        $products->transform(function ($product) {
            $product->image = $product->image ? asset("images/products/{$product->image}") : null;
            return $product;
        });

        return response()->json([
            "products" => $products,
            "categoryProducts" => $categoryProducts,
        ], 200);
    }
    public function indexCategory()
    {
        $categoryProducts = Category::select('id', 'name')->get();

        return response()->json([
            "data" => $categoryProducts,
        ], 200);
    }


    public function detail($id)
    {

        $product_details = Product::find($id);
        $product_details->image = $product_details->image ? asset("images/products/{$product_details->image}") : null;

        $promoPrice = $product_details->promo_price ?? null;

        // Memeriksa kondisi dan menetapkan nilai promo_price menjadi NULL jika kondisi tidak terpenuhi
        if ($product_details && $product_details->is_promo == 1 && $product_details->promo_start_date <= date('Y-m-d') && $product_details->promo_end_date >= date('Y-m-d')) {
            // Kondisi promo berlaku, promo_price tetap seperti sebelumnya

        } else {
            // Kondisi promo tidak berlaku, set promo_price menjadi NULL
            $promoPrice = null;
        }

        $variants = DB::table('product_variants')
            ->join('variant_attribute_values', 'variant_attribute_values.id', '=', 'product_variants.variant_attribute_value_id')
            ->join('variant_attributes', 'variant_attributes.id', '=', 'product_variants.variant_attribute_id')
            ->where('product_id', $id)
            ->get();


        return response()->json([

            "promoPrice" => $promoPrice,
            "product_details" => $product_details,
            "variants" => $variants,
        ], 200);
    }
}