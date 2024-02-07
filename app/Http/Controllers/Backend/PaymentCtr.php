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
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('photo');
        $uniqueCode = uniqid(); // Generate unique code
        $date = now()->format('Ymd'); // Get current date in YYYYMMDD format

        $fileName = "bukti_upload_{$uniqueCode}_{$date}.{$file->getClientOriginalExtension()}";

        // Upload file to public/transfer_evidence
        $filePath =  $file->move(public_path('transfer_evidence'), $fileName);

        $data =Sale::where('id', $request->sale_id) // Gantilah 'id' dengan primary key yang sesuai
        ->update([
            'transfer_evidence' => $filePath,
            'payment_statut' => "sudah_upload",
            'statut' => "sudah_upload",
        ]);

        return response()->json([
            'message' => 'Upload transfer evidence successfully',
            'data' => $data,
        ]);
    }
}
