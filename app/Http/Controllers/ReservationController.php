<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = auth()->user()->reservations()->latest('id')->with('room', 'room.hotel')->paginate()->withQueryString();
        return view('reservation.index', [
            'reservations' => $reservations
        ]);
    }

    public function accept(Reservation $reservation)
    {
        $reservation->update([
            'is_accepted' => true,
        ]);

        return redirect()->back()->with('success', 'La reservation a ete bien acceptee !');
    }

    public function refuse(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->back()->with('error', 'La reservation a ete bien refusee !');
    }
}
