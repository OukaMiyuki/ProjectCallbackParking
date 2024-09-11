<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentConfirmController extends Controller {
    public function handleInvoice(Request $request) {
        Log::info('Request data:', $request->all());

        // Capturing top-level data
        $data = [
            'login' => $request->input('login'),
            'password' => $request->input('password'),
            'api_key' => $request->input('api_key'),
            'partnerTransactionNo' => $request->input('partnerTransactionNo'),
            'partnerReferenceNo' => $request->input('partnerReferenceNo'),
            'amount' => $request->input('amount'),
            'mdrPaymentAmount' => $request->input('mdrPaymentAmount'),
            'paymentStatus' => $request->input('paymentStatus'),
            'invoice_number' => $request->input('invoice_number'),
            'paymentTimeStamp' => $request->input('paymentTimeStamp'),
            'responseStatus' => $request->input('responseStatus'),
            'status' => $request->input('status'),

            // Capturing nested 'invoiceInfo' data
            'invoiceInfo' => [
                'transactionDate' => $request->input('invoiceInfo.transactionDate'),
                'paymentDate' => $request->input('invoiceInfo.paymentDate'),
                'paymentType' => $request->input('invoiceInfo.paymentType'),
                'paymentStatus' => $request->input('invoiceInfo.paymentStatus'),
                'tax' => $request->input('invoiceInfo.tax'),
                'discount' => $request->input('invoiceInfo.discount'),
                'mdr' => $request->input('invoiceInfo.mdr'),
                'mdrAmount' => $request->input('invoiceInfo.mdrAmount'),
                'cleanAmount' => $request->input('invoiceInfo.cleanAMount'),
                'aditionalInformation' => [
                    'customReference' => $request->input('invoiceInfo.aditionalInformation.customReference'),
                    'issuerId' => $request->input('invoiceInfo.aditionalInformation.issuerId'),
                    'retrievalReferenceNo' => $request->input('invoiceInfo.aditionalInformation.retrievalReferenceNo'),
                    'paymentReferenceNo' => $request->input('invoiceInfo.aditionalInformation.paymentReferenceNo'),
                ],
            ],
        ];

        // Log individual variables if needed
        Log::info('Login:', [$data['login']]);
        Log::info('Password:', [$data['password']]);
        Log::info('Partner Transaction No:', [$data['partnerTransactionNo']]);
        Log::info('Invoice Info:', $data['invoiceInfo']);
        Log::info('Aditional Information:', $data['invoiceInfo']['aditionalInformation']);

        return response()->json([
            'message' => "success"
        ]);
    }
}
