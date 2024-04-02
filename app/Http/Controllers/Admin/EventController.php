<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EventStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventStoreRequest $request)
    {
        if ($request->guest_number > 45) {

            Alert::warning('Number of Guests exceeds the limit. Please input between 1 to 45 guests.');
            return back();
        }
    
        // Fetch all events
        $events = Event::all();
    
        $request_date = Carbon::parse($request->res_date);
    
        // Check if the requested date is already reserved for an event
        foreach ($events as $event) {
            $reservationDate = is_string($event->res_date) ? Carbon::parse($event->res_date) : $event->res_date;
        
            if ($reservationDate->format('Y-m-d') == $request_date->format('Y-m-d')) {

                Alert::warning('This date is already taken for an event.');
                return back();
            }
        }

    
        // If the requested date is available, create the event
        Event::create($request->validated());
    
        Alert::success('Thankyou! Your Reservation created successfully.');
        return redirect()->route('admin.events.index');
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
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(EventStoreRequest $request, Event $event)
    {
        if ($request->guest_number > 45) {

            Alert::warning('Number of Guests exceeds the limit. Please input between 1 to 45 guests.');
            return back();
        }
    
        // Fetch all events
        $events = Event::all();
    
        $request_date = Carbon::parse($request->res_date);
    
        // Check if the requested date is already reserved for an event

       
    
        // If the requested date is available, update the event
        $event->update($request->validated());
    
        Alert::success('Event updated successfully.');
        return redirect()->route('admin.events.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        Alert::success('Event has been removed successfully.');
        return to_route('admin.events.index');
}
}
