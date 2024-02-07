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
        $sales= new Sale();
        $sales->user_id = Auth::user()->id;
        $sales->date = date('Y-m-d H:i:s');
        $sales->ref = $request->ref;
        $sales->save();


        $dataDetails=[];

        // foreach($products as $product){

            $dataProduct =  Product::with('variants')->find($request->product_id);
           
            $salesDetail= new SaleDetail();
            $salesDetail->total = ($dataProduct->price + $dataProduct->TaxNet )- $dataProduct->discount ;
            $salesDetail->sale_id = $sales->id;
            $salesDetail->product_id = $dataProduct->id;
            $salesDetail->product_variant_id = $request->product_variant_id;
            $salesDetail->price = $dataProduct->price;
            $salesDetail->imei_number = $dataProduct->imei_number;
            $salesDetail->TaxNet = $dataProduct->TaxNet;
            $salesDetail->discount = $dataProduct->discount;
            $salesDetail->save();

            $variant_attribute =[ $request->color, $request->size, $request->variant ]; 
            for($i=0;  $i <= 2; $i++)
            {
                $data= new ProductVariantOption();
                $data->product_variant_id= $dataProduct->variants[0]['id'];
                $data->attribute_id= $variant_attribute[$i];
                // $data->additional_cost= $variant_attribute[$i];
                // $data->additional_price= $variant_attribute[$i];
                $data->save();
            }

            // ambil data sales detail id 
            // $dataDetails[]=$salesDetail->id;
        // };
        
            // $grandTotal = SaleDetail::whereIn('id', $dataDetails)->sum('total');
           //  sales detail menyimpan 1 product    
            // if untuk diskon atau tax yang berdasarkan persen nanti dibuat 
            // function nya juga dibuat 
            // nanti ditambah additional price juga 

            // updaate grand total di sales dia diambil dari total di sales detail 
            // sum semua berdasarkan user id nya dan status payment nya 
            
            // $grandTotal = SaleDetail::whereIn('sale_detail', $dataDetails)->sum('total');
            $grandTotal = DB::table('sales')
            ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
            ->where('sales.id', '=', $sales->id)
            ->sum('sale_details.total');
            // dd($grandTotal);
           
            $sales->GrandTotal = $grandTotal;
            $sales->payment_statut = "Belum Bayar";
            $sales->statut = "Belum Bayar";
            $sales->save();
             
        return response()->json([
            'message' => 'Sale created successfully',
            'data' => $sales,
        ]);
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