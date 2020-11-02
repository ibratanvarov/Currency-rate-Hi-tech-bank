<?php


namespace App\Http\Controllers;


use http\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
