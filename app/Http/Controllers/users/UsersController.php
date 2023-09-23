<?php

namespace App\Http\Controllers\users;

use App\Models\Food\Review;
use Illuminate\Http\Request;
use App\Models\Food\Bookings;
use App\Models\Food\CheckOut;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function getBookings()
    {
        $allBookings = Bookings::where('id', Auth::user()->id)->get();

        return view('users.bookings', compact('allBookings'));
    }


    public function getorders()
    {
        $allorders = CheckOut::where('id', Auth::user()->id)->get();

        return view('users.orders', compact('allorders'));
    }




    public function viewReview()
    {
        return view('users.writereviews');
    }

    public function submitReview(Request $request)
    {

        $request->validate([
            "name" => "required",
            "review" => "required",
          
            
        ]);

        $submitReview = Review::create([
            "review" => $request->review,
            "name" => $request->name,
        ]);

        if($submitReview){
          
            return redirect()->route('users.createreviews')->with(['success' => 'Your Review was successful']);

            
        }

        // return view('users.writereviews');
    }




}
