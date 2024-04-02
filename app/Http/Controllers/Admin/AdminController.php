<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    
    {
        if (Auth::id())
        {
          $role=Auth()->user()->role;
    
          if($role=='user')
          {
            return view('home');
          }
    
          else if($role=='Admin')
          {
            return view('dashboard');
          }
    
          else
          {
            return redirect()->back();
          }
         
          
         }
      }

}
