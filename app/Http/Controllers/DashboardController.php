<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function home()
    {
        $data['home_active'] = 'active';
        return view('home.index', $data);
    }
}
