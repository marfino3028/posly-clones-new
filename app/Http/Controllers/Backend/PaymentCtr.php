<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\ProductVariant;
use App\Models\Sale;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\TwiML\Voice\Say;

class PaymentCtr extends Controller
{
    public function index()
    {
        $dataPayment = PaymentMethod::get();
        $dataSale = Sale::where('user_id', Auth::user()->id)->first();
        $dataAddres=UserAddress::get();

        return response()->json([
            'message' => 'Get data successfully',
            'dataPayment' => $dataPayment,
            'dataSale' => $dataSale,
            'dataAddres' => $dataAddres,
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

        $data = Sale::where('id', $request->sale_id) // Gantilah 'id' dengan primary key yang sesuai
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

    public function payNow(Request $request)
    {
        $userName = auth()->user()->nama;
        $prefix = substr($userName, 0, 3);
        $randomNumber = mt_rand(1000, 9999); // Anda dapat menyesuaikan rentang sesuai kebutuhan
        $uniqueNumber = $prefix . $randomNumber;

        Sale::where('id', $request->sale_id) // Gantilah 'id' dengan primary key yang sesuai
            ->update([
                'payment_method_id' => $request->payment_method_id,
                'alamat_id' => $request->alamat_id,
                'ref' => $uniqueNumber
            ]);
        $data = Sale::find($request->sale_id);
        return response()->json([
            'message' => 'pay now success',
            'data' => $data,
        ]);
    }

    public function orderSummary()
    {
        $data = Sale::with('payment_method','alamat', 'details', 'details.product')->where('user_id', Auth::user()->id)->orderBy('created_at','desc')->first();

        // Mendapatkan data varian berdasarkan product_variant_id yang ada di setiap detail
        // foreach ($data as $sale) {
            foreach ($data->details as $detail) {
                // $productVariantIds = json_decode($detail->product_variant_id);

                $variants = ProductVariant::where('id', $detail->product_variant_id)->get();

                // Menambahkan data varian ke dalam detail
                $detail->variants = $variants;
            }
        // }
        return response()->json([
            'message' => 'Get data successfully',
            'data' => $data,
        ]);
    }
}