<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tables = Table::count();
        $reservations = Reservation::count();
        $events = Event::count();
        return view('admin.dashboard', compact('tables', 'reservations','events'));
    }
}
