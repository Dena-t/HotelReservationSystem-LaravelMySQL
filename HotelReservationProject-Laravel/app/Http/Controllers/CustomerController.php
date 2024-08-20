<?php

namespace App\Http\Controllers;
use App\Models\customers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index(){
        $customers = customers::paginate(5);
    return view('welcome',compact('customers'));
}
    public function showRooms()
    {
        $contents = Storage::get('room_details.txt');
        $lines = explode("\n", $contents);
        $rooms = [];
        foreach ($lines as $line) {
            $details = explode(",", $line);
            $rooms[] = [
                'id'=> $details[0],
                'number' => $details[1],
                'capacity'=> $details[2],
                'rate' => $details[3],
                'facilities' => array_slice($details, 4)
            ];
        }
// Fetching reserved rooms from DB converting it to array
        $naRooms=Customers::distinct('room_id')->pluck('room_id')->toArray();
// defining available rooms array
    $available = [];
    foreach ($rooms as $room) {
        if (!in_array($room['number'],$naRooms)) {
            $available[] = $room['number'];
        }
    }
        return view('reserve',compact('rooms','available','naRooms'));

    }
    public function reserveRoom(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,15',
            'email' => 'required|email|max:255',
            'checkin_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after:checkin_date',
        ];
        $messages = [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must be a valid email address.',
            'exists' => 'The selected :attribute is invalid.',
            'after_or_equal' => 'The :attribute must be a date after or equal to today.',
            'after' => 'The :attribute must be a date after check-in date.',
        ];

           // Validate request
       $validator = Validator::make($request->all(), $rules, $messages);
       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }
       // Sanitization (Laravel automatically sanitizes input, but you can add specific sanitization if needed)

        $reservation = new customers();
        $reservation->name = $request->input('name');
        $reservation->phone = $request->input('phone');
        $reservation->email = $request->input('email');
        $reservation->room_id = $request->input('room');
        $reservation->checkin_date = $request->input('checkin_date');
        $reservation->checkout_date = $request->input('checkout_date');
        $reservation->save();
        return redirect(route('home'))->with('successMSG','Reservation successfully added');
    }
    public function allRooms(Request $request)
    {
        $contents = Storage::get('room_details.txt');
        $lines = explode("\n", $contents);
        $rooms = [];
        foreach ($lines as $line) {
            $details = explode(",", $line);
            $rooms[] = [
                'id'=> $details[0],
                'number' => $details[1],
                'capacity'=> $details[2],
                'rate' => $details[3],
                'facilities' => array_slice($details, 4)
            ];
        }
        $perPage = 5;
   // Slice the collection to get the items to display in current page
   $currentPageItems = array_slice($rooms, ($request->input('page', 1) - 1) * $perPage, $perPage);
   // Create our paginator and pass it to the view
   $paginatedItems= new LengthAwarePaginator($currentPageItems , count($rooms), $perPage);
   // set url path for generted links
   $paginatedItems->setPath($request->url());
   return view('rooms', compact('paginatedItems'));
}
    public function retrieveUserInfo(){

        $user = auth()->user();
        $email = $user->email;


        $reservations = customers::where('email', $email)->with('room')->get();

        
        return view('user-info', compact('user','reservations'));

        }
        public function calendar(){
            return view('calendar');

        }
    
    }
    
  
    
  

