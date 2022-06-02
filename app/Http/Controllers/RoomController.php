<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = auth()->user()->rooms()->with('hotel')->latest('id')->paginate();
        $categories = auth()->user()->categories()->get();
        return view('rooms.index', compact('rooms', 'categories'));
    }

    public function store(RoomRequest $request)
    {
        auth()->user()->rooms()->create($request->withUploadingImage());
        return redirect()->route('user.rooms.index');
    }

    public function update(Room $room, RoomRequest $request)
    {
        $room->update($request->withUploadingImage());


        return redirect()->route('user.rooms.index');
    }

    public function edit(Room $room)
    {
        $categories = auth()->user()->categories()->get();
        return view('rooms.modal', compact('room', 'categories'));
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('user.rooms.index');
    }
}
