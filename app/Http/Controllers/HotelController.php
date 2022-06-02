<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin_manager']);
    }

    public function userHotel()
    {
        $hotel = auth()->user()->hotel()->first();
        return view('hotel.index', [
            'hotel' => $hotel
        ]);
    }
}
