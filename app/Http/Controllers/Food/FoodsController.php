<?php

namespace App\Http\Controllers\Food;

use Session;
use App\Models\Food\Cart;
use App\Models\Food\Food;
use Illuminate\Http\Request;
use App\Models\Food\CheckOut;
// use Illuminate\Contracts\Session\Session;
use Ramsey\Uuid\Rfc4122\Validator;
use App\Http\Controllers\Controller;
use App\Models\Food\Bookings;
use Illuminate\Support\Facades\Auth;

class FoodsController extends Controller
{
    public function fooddetails($id)
    {
        $foodItem = Food::find($id);
        
        // $cart = session()->get('cart');

        //to get and put the selected cart at the top
        // $cart[$id] = [
        //     "user_id" => $foodItem->user_id,
        //     "food_id" => $foodItem->food_id,
        //     "quantity" => 1,
        //     "name" => $foodItem->name,
        //     "image" => $foodItem->image,
        //     "price" => $foodItem->price,
        // ];

        
        if(auth()->user()){
            //verify if user added to cart
            $cartverify = Cart::where('food_id', $id)
            ->where('user_id', Auth::user()->id)->count();

            return view('foods.fooddetails', compact('foodItem', 'cartverify'));

        }else{
            return view('foods.fooddetails', compact('foodItem'));

        }

        

        
    }


    public function cart(Request $request, $id)
    {
        $cart = Cart::create([
            "user_id" => $request->user_id,
            "food_id" => $request->food_id,
            "quantity" => $request->quantity,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,

        ]);

        if($cart){
            return redirect()->route('fooddetails', $id)->with(['success' => 'Item added to cart successfully']);
        }
    }



    public function displaycartitems()
    {
      
        if(auth()->user()){

        //display cart Items
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();


         //display cart Items
         $price = Cart::where('user_id', Auth::user()->id)->sum('price');

        
        return view('foods.carts', compact('cartItems', 'price'));
    }else{
        abort('404');
    }



    }


public function deletecartitems($id)
{
    $deleteItem = Cart::where('user_id', Auth::user()->id)->where('food_id', $id);

    $deleteItem->delete();

    if($deleteItem){
        return redirect()->route('displaycarts')->with(['delete' => 'Item deleted successfully']);
    }
}



public function preparecheckout(Request $request)
    {

        $value = $request->price;
        $request->session()->put('price', $value);
    //    $price = Session::get('price', $value);

    $newPrice = session()->get('price');

        if($newPrice > 0){
            if(session()->get('price') === 0){
                abort('403');
            }else{
                return view('foods.checkout', compact('newPrice'));

            }
        }

    }


    public function storecheckout(Request $request)
    {

        // Request()->validate([
        //     "name" => "required",
        //     "email" => "required",
        //     "town" => "required",
        //     "country" => "required",
        //     "phone" => "required",
        //     "address" => "required",
        //     "zipcode" => "required",
        //     "user_id" => "required",
        //     "price" => "required",
        // ]);

        $checkout = CheckOut::create([
            "name" => $request->name,
            "email" => $request->email,
            "town" => $request->town,
            "country" => $request->country,
            "phone" => $request->phone,
            "address" => $request->address,
            "zipcode" => $request->zipcode,
            "user_id" => Auth::user()->id,
            "price" => $request->price,


        ]);

        // echo "go to paypal";

        if($checkout){
            if(session()->get('price') == 0){
                abort('403');
            }else{
                return redirect()->route('foods.pay');

            }
        }
    }


    public function paypal()
    {
        if(session()->get('price') == 0){
            abort('403');
        }else{
            return view('foods.pay');

        }
    }

    public function success()
    {
        //this code will automatically delete all cart history after payment is success
        $deleteItem = Cart::where('user_id', Auth::user()->id);
        $deleteItem->delete();

        if($deleteItem){

            if(session()->get('price') == 0){

                abort('403');
            }else{

                session()->forget('price');

                return view('foods.success')->with(['success' => 'Your payment was successful']);

            }
        }

      
    }


    public function booking(Request $request)
    {

        $request->validate([
            "name" => "required|min:3",
            "email" => "required|min:2",
            "date" => "required",
            "num_people" => "required",
            "spe_request" => "required",
            
        ]);

        $currentDate = date('m/d/Y h:i:sa');

        if($request->date == $currentDate OR $request->date < $currentDate){

            return redirect()->route('home')->with(['error' => 'you cant book with the past date!']);

        }else{
            $booking = Bookings::create([
                "user_id" => Auth::user()->id,
                "name" => $request->name,
                "email" => $request->email,
                "date" => $request->date,
                "num_people" => $request->num_people,
                "spe_request" => $request->spe_request,
            
            ]);

        }

        if($booking){
          
            return redirect()->route('users.bookings')->with(['booked' => 'You booked a new table']);

            
        }
    }



    public function menu()
    {
        $breakfastFoods = Food::select()->take(4)
        ->where('category', 'Break fast')->orderBy('id', 'desc')->get();

        $lunchFoods = Food::select()->take(4)
        ->where('category', 'Lunch')->orderBy('id', 'desc')->get();

        $dinnerFoods = Food::select()->take(4)
        ->where('category', 'Dinner')->orderBy('id', 'desc')->get();

        return view('foods.menu', compact('breakfastFoods', 'lunchFoods', 'dinnerFoods'));
    }

















































}
