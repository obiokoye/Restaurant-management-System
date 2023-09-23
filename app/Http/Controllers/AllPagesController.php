<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllPagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function addcart()
    {
        return view('pages.addcart');
    }


    public function booking()
    {
        return view('pages.booking');
    }


    public function checkout()
    {
        return view('pages.checkout');
    }


    public function contact()
    {
        return view('pages.contact');
    }


    public function menu()
    {
        return view('pages.menu');
    }


    public function services()
    {
        return view('pages.services');
    }


    public function team()
    {
        return view('pages.team');
    }


    public function testimony()
    {
        return view('pages.testimony');
    }





















}
