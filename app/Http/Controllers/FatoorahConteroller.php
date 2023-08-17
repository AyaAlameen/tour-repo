<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FatoorahServices;
use Illuminate\Support\Facades\Redirect;

class FatoorahConteroller extends Controller
{
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices){
        $this->fatoorahServices = $fatoorahServices;
    }
    public function payOrder(Request $request){
        // dd($request);
        // $request->validate([
        //     'full_name' => 'required',
        //     'start_date' => 'required|date|after:today',
        //     'people_count' => ['required', 'numeric', 'min:1'],
            
        // ], [
        //     'full_name.required' => 'حقل الاسم الكامل مطلوب',
        //     'start_date.required' => 'حقل تاريخ البداية مطلوب',
        //     'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
        //     'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
        //     'people_count.required' => 'حقل عدد الأشخاص مطلوب',
        //     'people_count.numeric' => 'حقل عدد الأشخاص يجب أن يتكون من أرقام فقط',
        //     'people_count.min' => 'حقل عدد الأشخاص يجب أن يكون أكبر من 0',

        // ]);

        $data = [
            'CustomerName' => $request->full_name,
            'NotificationOption' => 'LNK',
            'InvoiceValue' => $request->booking_cost * $request->people_count,
            'CustomerEmail' => /*\Auth::user()->email*/'aa@ee.com',
            'CallBackUrl' => env('success_url'),
            'ErrorUrl' => env('error_url'),
            'Language' => 'en',
            'DisplayCurrencyIso' => 'SAR',
        ];
        
        // dd($data);
        $paymentData = $this->fatoorahServices->sendPayment($data);
        // dd($this->fatoorahServices->sendPayment($data));
        return $paymentData;
        // dd($paymentData['Data']['InvoiceURL']);
        // return Redirect::to($paymentData['Data']['InvoiceURL']);
        // return true;
    }

    public function paymentCallBack(Request $request)
    {
        $data = [];
        $data['key'] = $request->paymentId;
        $data['keyType'] = 'paymentId';

        return $this->fatoorahServices->getPaymentStatus($data);
    }
}
