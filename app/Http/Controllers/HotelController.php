<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoteRequest;
use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HotelController extends Controller
{
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

    public function searchForHotels(Request $request)
    {
        return view('search', [
            'hotels' => \App\Models\Hotel::whereNotNull('name')->paginate()->withQueryString()
        ]);
    }

    public function hotelRooms(Hotel $hotel)
    {
        $rooms = $hotel->rooms()->paginate();
        return view('hotel_rooms', compact('rooms', 'hotel'));
    }

    public function reserver(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'email',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'room_id' => [
                'required',
                'numeric',
                'exists:rooms,id',
            ],
            'station' => [
                'required',
                'string'
            ],
            'check_in' => [
                'required',
                'string'
            ],
            'check_out' => [
                'required',
                'string'
            ],
            'adults' => [
                'required',
                'numeric'
            ],
            'kids' => [
                'required',
                'numeric'
            ],
        ]);

        Reservation::create([
            ...$data,
            'user_id' => $hotel->user_id
        ]);

        return redirect()->back()->with('success', 'Votre reservation a ete bien enregistree');
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function postContactUs(Request $request)
    {
        $data = $request->validate([
            'first_name' => [
                'required',
                'string',
            ],
            'last_name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
            ],
            'subject' => [
                'required',
                'string',
            ],
            'description' => [
                'required',
                'string',
            ],
        ]);

        Contact::create($data);

        return redirect()->back()->with('success', 'Votre message a ete bien enregistre');
    }
}
