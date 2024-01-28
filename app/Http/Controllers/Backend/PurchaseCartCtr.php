<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Models\PurchaseCart;

class PurchaseCartCtr extends Controller
{

    public function create(Request $request)
    {
      
        // Find existing cart entry with the same product_id and product_variant_id
        $existingCartEntry = PurchaseCart::where('product_id', $request->product_id)
        ->where('product_variant_id', json_encode(array_map('intval', $request->product_variant_id)))
        ->first();

        if ($existingCartEntry) {

        // If the entry already exists, update the quantity
        $existingCartEntry->quantity += $request->quantity;
        $existingCartEntry->total_price += $request->price * $request->quantity;
        $existingCartEntry->save();

        return response()->json([
            'message' => 'Purchase cart updated successfully',
            'data' => $existingCartEntry,
        ]);

        } else {

        // If the entry doesn't exist, create a new one
        $data = new PurchaseCart();
        $data->user_id = $request->user_id;
        $data->product_id = $request->product_id;
        $data->product_variant_id = json_encode(array_map('intval', $request->product_variant_id));
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->total_price = $request->price * $request->quantity;
        $data->save();
        return $data;
        
        return response()->json([
            'message' => 'Purchase cart updated successfully',
            'data' => $data,
        ]);

        }

    }


    public function cartById(Request $request)
    {
        $carts = PurchaseCart::with('products')->where('user_id', $request->user_id)->get();
        $providers=Provider::get();

        $response = [
            'message' => 'Purchase cart created successfully',
            'carts' => $carts,
            'providers' => $providers,
        ];
        
        return response()->json(['response' => $response]);

    }

}