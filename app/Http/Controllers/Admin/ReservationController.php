<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Available) -> get();
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
   
    $table = Table::findOrFail($request->table_id);
    if ($request->guest_number > $table->guest_number) {
        Alert::warning('Please input guest number based on table.');
        return back();

        }


        $request_date = Carbon::parse($request->res_date);

        foreach($table->reservation as $res) {
           
            $reservationDate = is_string($res->res_date) ? Carbon::parse($res->res_date) : $res->res_date;
        
            if ($reservationDate->format('Y-m-d') == $request_date->format('Y-m-d')) {

                Alert::warning('This table is reserved for this date.');
                return back();
            }
        }

       Reservation::create($request->validated());
       

       Alert::success('Reservation created successfully.');
       return to_route('admin.reservation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservation.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request -> table_id);
        if($request -> total_guest > $table -> total_guest){

            Alert::warning('Please choose table based on guests.');
            return back();
        }
        
        $request_date = Carbon::parse($request->res_date);
        $reservations = $table -> reservation() -> where('id', '!=', $reservation -> id) -> get();

        foreach ($reservations as $res) {
            $reservationDate = is_string($res->res_date) ? Carbon::parse($res->res_date) : $res->res_date;
        
            if ($reservationDate instanceof Carbon && $reservationDate->format('Y-m-d') == $request_date->format('Y-m-d')) {

                Alert::warning('This table is reserved for this date.');
                return back();
            }
        }
        
        $reservation -> update($request -> validated());

        Alert::success('Reservation updated succesfully!');
        return to_route('admin.reservation.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
        {
            $user = Auth::user();
            $reservation = Reservation::find($id);
            $reservation->delete();
                
            if($reservation){
            
                Alert::success('Success', 'Your reservation has been cancelled');
                return redirect()->back();
            }else{
                Alert::success('Reservation has been removed.');
                return redirect()->back();
            }
        
        }

}
