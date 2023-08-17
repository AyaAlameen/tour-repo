<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FatoorahServices;
use App\Models\Booking;
use Illuminate\Support\Facades\Redirect;

class FatoorahConteroller extends Controller
{
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices){
        $this->fatoorahServices = $fatoorahServices;
    }
    public function payOrder(Request $request){
        // dd($request);
        $request->validate([
            'full_name' => 'required',
            'start_date' => 'required|date|after:today',
            'people_count' => ['required', 'numeric', 'min:1'],
            
        ], [
            'full_name.required' => 'حقل الاسم الكامل مطلوب',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'people_count.required' => 'حقل عدد الأشخاص مطلوب',
            'people_count.numeric' => 'حقل عدد الأشخاص يجب أن يتكون من أرقام فقط',
            'people_count.min' => 'حقل عدد الأشخاص يجب أن يكون أكبر من 0',

        ]);
        
        $data = [
            'CustomerName' => $request->full_name,
            'NotificationOption' => 'LNK',
            'InvoiceValue' => $request->booking_cost * $request->people_count,
            'CustomerEmail' => $request->user_email,
            'CallBackUrl' => env('success_url'),
            'ErrorUrl' => env('error_url'),
            'Language' => 'en',
            'DisplayCurrencyIso' => 'SAR',
            'moreData' => $request->all(),
        ];

        $booking = new Booking();
        $booking->user_id = $request->user_id;
        $booking->full_name = $request->full_name;
        $booking->people_count = $request->people_count;
        $booking->start_date = $request->start_date;
        $booking->cost = $request->booking_cost;
        $booking->model_id = $request->booking_type_id;
        $booking->model_type = 'App\Models\Place';

        $booking->save();


        return $this->fatoorahServices->sendPayment($data);
    }

    public function paymentCallBack(Request $request)
    {
        $data = [];
        $data['key'] = $request->paymentId;
        $data['keyType'] = 'paymentId';

        return $this->fatoorahServices->getPaymentStatus($data);
        
        // $booking = new Booking();
        // $booking->user_id = $bookingData->moreData['user_id'];
        // $booking->full_name = $bookingData->moreData['full_name'];
        // $booking->people_count = $bookingData->moreData['people_count'];
        // $booking->start_date = $bookingData->moreData['start_date'];
        // $booking->cost = $bookingData->moreData['cost'];
        // $booking->model_id = $bookingData->moreData['booking_type_id'];
        // $booking->model_type = 'App\Models\Place';

        // $booking->save();
        // return $bookingData;
        
    }
}
