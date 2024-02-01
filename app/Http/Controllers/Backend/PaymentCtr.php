<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaymentCtr extends Controller
{
    public function index()
    {
        $dataPayment=PaymentMethod::get(); 
        $dataSale=Sale::where('user_id', Auth::user()->id)->first();

        return response()->json([
            'message' => 'Get data successfully',
            'dataPayment' => $dataPayment,
            'dataSale' => $dataSale,
        ]);

    }

    public function upload(Request $request)
    {
        $data =Sale::where('id', $request->sale_id) // Gantilah 'id' dengan primary key yang sesuai
        ->update([
            'transfer_evidence' => $request->transfer_evidence,
            'payment_statut' => $request->payment_status,
            'statut' => $request->status,
        ]);

        return response()->json([
            'message' => 'Upload transfer evidence successfully',
            'data' => $data,
        ]);
    }
}
