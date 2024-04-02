<?php

namespace App\Http\Controllers;

use App\Enums\TableStatus;
use App\Models\Menu;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\redirect;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Event;
use App\Models\R2_menus;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all menus
        $menus = R2_menus::all();
    
  

        // Set minimum and maximum dates for reservation
        $min_date = Carbon::tomorrow();
        $max_date = Carbon::tomorrow()->addWeek();

        // Validate reservation form data
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
                'tel_number' => ['required'],
                'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
                'table_id' => ['required'],
                'guest_number' => ['required'],
                'location' => ['required'],
                'payment_status' => ['required'],
            ]);


            // Check if the requested table can accommodate the guest number
            $table = Table::findOrFail($request->table_id);
            if ($request->guest_number > $table->guest_number) {
                Alert::warning('Please input guest number based on table.');
                return back()->withInput();
            }

      



            // Check for existing reservations on the same date for the selected table
            $request_date = Carbon::parse($request->res_date);
            foreach ($table->reservation as $res) {
                $reservationDate = is_string($res->res_date) ? Carbon::parse($res->res_date) : $res->res_date;
                if ($reservationDate->format('Y-m-d') == $request_date->format('Y-m-d')) {
                    Alert::warning('This table is reserved for this date.');
                    return back()->withInput();
                }
            }



            // Create a new Reservation instance
            $reservation = new Reservation();
            $reservation->fill($validated);
            $reservation->save();



            Alert::success('Thank You! Your Reservation is Now Processing.');
            return redirect()->route('home');
        }

        // Retrieve available tables for reservation
        $tables = Table::where('status', TableStatus::Available)->get();

        // Return home view with menus, minimum and maximum dates, and available tables
        return view('home', compact('menus', 'min_date', 'max_date', 'tables'));
    }

    public function event(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'tel_number' => ['required'],
            'res_date' => ['required', new DateBetween, new TimeBetween],
            'guest_number' => ['required'],
            'event_type' => ['required'],
        ]);
        $event_reserve = new Event;
        $downpayment = '5000';


        $event_reserve->name = $validatedData['name'];
        $event_reserve->email = $validatedData['email'];
        $event_reserve->tel_number = $validatedData['tel_number'];
        $event_reserve->guest_number = $validatedData['guest_number'];
        $event_reserve->event_type = $validatedData['event_type'];
        $event_reserve->downpayment = $downpayment;
        $event_reserve->other_request = $request['other_request'];
        $event_reserve->payment_status = $request['payment_status'];
        $event_reserve->res_date = Carbon::parse($request->res_date);


        if ($request->guest_number > 45) {
            Alert::warning('Number of Guests exceeds the limit. Please input between 10 to 45 guests.');
            return back()->withInput();
        }

        // Check for existing events on the same date
        $existingEvent = Event::whereDate('res_date', $request['res_date'])->first();
        if ($existingEvent) {
            Alert::warning('This date is already taken for an event.');
            return back()->withInput();
        }


        $event_reserve->save();
        Alert::success('Thank You! Your Reservation is Now Processing.');
        return redirect()->route('home');
    }

    // Check if the requested event can accommodate the guest numbe
}
