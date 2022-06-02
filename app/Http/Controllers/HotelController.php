<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    public function index()
    {
        $hote = auth()->user()->hotel()->first();
        return view('hotel.index');
    }
}
