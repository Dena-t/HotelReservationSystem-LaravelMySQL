<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomController extends Controller
{
   public function storeRooms()
   {
       $contents = Storage::get('room_details.txt');
       $lines = explode("\n", $contents);
       foreach ($lines as $line) {
           $details = explode(",", $line);
           $facilities = implode(',', array_slice($details, 4)); // Convert facilities to a string
           Room::create([
               'number' => $details[1],
               'capacity' => $details[2],
               'rate' => $details[3],
               'facilities' => $facilities,
           ]);
       }
       return redirect()->back()->with('status', 'Rooms have been stored successfully!');
   }
}