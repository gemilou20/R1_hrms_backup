<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\R2_menus;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        
        $menus = R2_menus::all();
        return view ('welcome', compact('menus'));
   
    }
}
