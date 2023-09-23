<?php

namespace App\Http\Controllers\Admins;

use App\Models\Food\Cart;
use App\Models\Food\Food;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\Food\Bookings;
use App\Models\Food\CheckOut;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 

class AdminsController extends Controller
{


    public function home()
    {
        $foodcount = Food::select()->count(); 
        $admincount = Admin::select()->count();
        $checkout = Checkout::select()->count();
        $booking = Bookings::select()->count();
        $pricetotal = Cart::sum('price');


        return view('admin-panel/index', compact('foodcount', 'admincount', 'checkout', 'booking', 'pricetotal'));
       
    }

    public function adminlogin()
    {
        return view('admin-panel/admins/login');
       
    }

    public function checklogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admins')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('home.admin');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
       
    }
    

    public function admins()
    {
        $admins = Admin::all();
        // $admins = Admin::find();
        return view('admin-panel/admins/admins', compact('admins'));
       
    }

    public function createAdmins()
    {
        
        return view('admin-panel/admins/create');
       
    }

    protected function storeAdmins(Request $request)
    {

        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $storeadmins = Admin::create([
        // return Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);

        if($storeadmins){
            return redirect()->route('admins')->with(['success' => 'Admin created successfully']);
        }
    }

   


    public function ordersadmins()
    {
        $allorders = CheckOut::all();
        return view('admin-panel/orders-admins/show-orders', compact('allorders'));
       
    }

    public function deleteorders($id)
    {
        
        $deleteorders= CheckOut::find($id);

        $deleteorders->delete();
        
        if($deleteorders){
            return redirect()->route('orders-admins')->with(['orderdelete' => 'Order Deleted successfully']);
        }       
    }


    public function foodsadmins()
    {
        $allfoods = Food::all();
        return view('admin-panel/foods-admins/show-foods', compact('allfoods'));
       
    }

    public function createfood()
    {
        return view('admin-panel/foods-admins/create-foods');
       
    }


    protected function storefood(Request $request)
    {

        $request->validate([
            "name" => "required",
            "price" => "required",
            "quantity" => "required",
            "description" => "required",
            "category" => "required",


        ]);
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        
        //     // Get the file extension
        //     $extension = $file->getClientOriginalExtension();
        
        //     // Check if the extension is allowed
        //     $allowedExtensions = ['jpeg', 'png', 'jpg', 'gif'];
        //     if (!in_array($extension, $allowedExtensions)) {
        //         return back()->withErrors(['image' => 'Invalid file format. Allowed formats: jpeg, png, jpg, gif']);
        //     }
        
        //     // Handle file upload and save
        //     $imagePath = $file->store('food_images', 'public');
        //     $imageFileName = basename($imagePath);
        // } else {
        //     $imageFileName = null; // No image uploaded.
        // }
        

        // // Handle image upload and save the file.
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('food_images', 'public');
        //     $imageFileName = basename($imagePath);
        // } else {
        //     $imageFileName = null; // No image uploaded.
        // }

        // Create a new Food instance with the uploaded image.
        $destinationPath = 'assets/img/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);
        
        $storefood = Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $myimage, // Store the image file name in the database.
            'description' => $request->description,
            'category' => $request->category,
        ]);

        if($storefood){
            return redirect()->route('foods-admins')->with(['createfood' => 'Food created successfully']);
        }
    }

    public function bookingsadmins()
    {
        $allbookings = Bookings::all();
        return view('admin-panel/bookings-admins/show-bookings', compact('allbookings'));
       
    }

    public function ordersstatus($id)
    {
        //this code below is responsible for displaying the order status page
        $orderstatus = CheckOut::find($id);
        return view('admin-panel/orders-admins/orderstatus', compact('orderstatus'));
       
    }
    

  
    public function updateordersstatus(Request $request, $id)
    {
        //this code below will change the order status to whatever you select
        $orderstatus = CheckOut::find($id);
        $orderstatus->update([
            "status" => $request->status
        ]);

        if($orderstatus){
            return redirect()->route('orders-admins')->with(['status' => 'Order Status Updated Successfully']);
        }
       
    }


    public function bookingstatus($id)
    {
        //this code below is responsible for displaying the order status page
        $bookingstatus = Bookings::find($id);
        return view('admin-panel/bookings-admins/bookingstatus', compact('bookingstatus'));
       
    }
    


    public function updatebooking(Request $request, $id)
    {
        //this code below will change the order status to whatever you select
        $bookingstatus = Bookings::find($id);
        $bookingstatus->update([
            "status" => $request->status
        ]);

        if($bookingstatus){
            return redirect()->route('bookings-admins')->with(['booking' => 'Order Status Updated Successfully']);
        }
       
    }

    public function deletebookings($id)
    {
        
        $deletebooking= Bookings::find($id);

        $deletebooking->delete();
        
        if($deletebooking){
            return redirect()->route('bookings-admins')->with(['deletebookings' => 'Booking Deleted successfully']);
        }       
    }



    public function deletefood($id)
    {
        
        $deletefood = Food::find($id);

        if(File::exists(public_path('assets/img/' . $deletefood->image))){
            File::delete(public_path('assets/img/' . $deletefood->image));
        }else{
            //dd('File does not exists.');
        }

        $deletefood->delete();
        
        if($deletefood){
            return redirect()->route('foods-admins')->with(['deletefood' => 'Food Deleted successfully']);
        }       
    }









}
