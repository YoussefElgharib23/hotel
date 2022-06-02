<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoteRequest;
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

    public function updateHotel(HoteRequest $request)
    {
        $hotel = auth()->user()->hotel()->first();
        $hotel->update($request->withUploadingImage());

        return redirect()->route('user.hotel');
    }
}
