<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseDetail;

class PurchaseCtr extends Controller
{
    public function create(Request $request)
    {
        $purchases = [];

        // Jika 'purchases' berupa array, iterasi dan proses setiap elemennya
        if (isset($request->purchases) && is_array($request->purchases)) {
            foreach ($request->purchases as $purchaseData) {
                $purchase = $this->createPurchase($purchaseData);
                $purchases[] = $purchase;
            }
        }
        // Jika 'purchases' tidak berupa array, proses sebagai satu pembelian
        else {
            $purchaseData = $request->all();
            $purchase = $this->createPurchase($purchaseData);
            $purchases[] = $purchase;
        }

        return response()->json([
            'message' => 'Purchases created successfully',
            'data' => $purchases,
        ], 200);
    }

    private function createPurchase($purchaseData)
    {

        // Create a new Purchase instance and fill it with the request data
        $purchase = new Purchase();
        $purchase->user_id = $purchaseData['user_id'];
        $purchase->Ref = $purchaseData['Ref'];
        $purchase->date = $purchaseData['date'];
        $purchase->provider_id = $purchaseData['provider_id'];
        $purchase->warehouse_id = $purchaseData['warehouse_id'];
        $purchase->tax_rate = $purchaseData['tax_rate'] ?? 0;
        $purchase->TaxNet = $purchaseData['TaxNet'] ?? 0;
        $purchase->discount = $purchaseData['discount'] ?? 0;
        $purchase->discount_type = $purchaseData['discount_type'];
        $purchase->discount_percent_total = $purchaseData['discount_percent_total'] ?? 0;
        $purchase->shipping = $purchaseData['shipping'] ?? 0;
        $purchase->GrandTotal = $purchaseData['GrandTotal'];
        $purchase->paid_amount = $purchaseData['paid_amount'];
        $purchase->statut = $purchaseData['statut'];
        $purchase->payment_statut = $purchaseData['payment_statut'];
        $purchase->notes = $purchaseData['notes'];
        $purchase->save();
            
        // Create PurchaseDetail for the current Purchase
        $this->createPurchaseDetail($purchase, $purchaseData);

        return $purchase;
    }

    private function createPurchaseDetail($purchase, $purchaseData)
    {
        // Create a new PurchaseDetail instance and fill it with the request data
        $purchaseDetail = new PurchaseDetail();
        $purchaseDetail->date = $purchaseData['date'];
        $purchaseDetail->cost = $purchaseData['cost'];
        $purchaseDetail->purchase_unit_id = $purchaseData['purchase_unit_id'];
        $purchaseDetail->TaxNet = $purchase->TaxNet;
        $purchaseDetail->tax_method = $purchaseData['tax_method'];
        $purchaseDetail->discount = $purchase->discount;
        $purchaseDetail->discount_method = $purchaseData['discount_method'];
        $purchaseDetail->product_id = $purchaseData['product_id'];
        $purchaseDetail->product_variant_id = $purchaseData['product_variant_id'];
        $purchaseDetail->imei_number = $purchaseData['imei_number'];
        $purchaseDetail->total = $purchaseData['total'];
        $purchaseDetail->quantity = $purchaseData['quantity'];
        $purchaseDetail->save();
    }
}