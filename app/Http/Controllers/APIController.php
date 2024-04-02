<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class APIController extends Controller
{
    public function getReservationData(Request $request){
        $reservation = new Reservation;

        if($reservation){
            $reservation->create([
                'name' => $request['name'], 
                'email' => $request['email'], 
                'tel_number' => $request['tel_number'], 
                'res_date' => $request['res_date'], 
                'table_id' => $request['table_id'], 
                'guest_number' => $request['guest_number'], 
                'location' => $request['location'],
                'payment_status' => $request['payment_status']
            ]);

            return response()->json([
                'message' => 'success'
            ]);
        }else{
            Alert::error('Something went wrong');
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function getEvent(Request $request){
        $event = new Event;

        if($event){
            $event->create([
                'name' => $request['name'], 
                'email' => $request['email'], 
                'tel_number' => $request['tel_number'], 
                'res_date' => $request['res_date'], 
                'guest_number' => $request['guest_number'], 
                'event_type' => $request['event_type'],
                'other_request' => $request['other_request'],
                'payment_status' => $request['payment_status'],
                'downpayment' => $request['downpayment'],
            ]);

            return response()->json([
                'message' => 'success'
            ]);
        }else{
            Alert::error('Something went wrong');
            return response()->json([
                'message' => 'error'
            ]);
        }
    }
}
