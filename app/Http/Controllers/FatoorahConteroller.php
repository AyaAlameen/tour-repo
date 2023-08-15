<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FatoorahServices;

class FatoorahConteroller extends Controller
{
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices){
        $this->fatoorahServices = $fatoorahServices;
    }
    public function payOrder(Request $request){
        
        $data = [
            'CustomerName' => $request->full_name,
            'NotificationOption' => 'LNK',
            'InvoiceValue' => $request->cost * $request->people_count,
            'CustomerEmail' => \Auth::user()->email,
            'CallBackUrl' => env('success_url'),
            'ErrorUrl' => env('error_url'),
            'Language' => 'en',
            'DisplayCurrencyIso' => 'SYP',
        ];

        return $this->fatoorahServices->sendPayment($data);
    }

    public function paymentCallBack(Request $request)
    {
        $data = [];
        $data['key'] = $request->paymentId;
        $data['keyType'] = 'paymentId';

        return $this->fatoorahServices->getPaymentStatus($data);
    }
}
