<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show_all_cars_page(){
        return view('cars');
    }
    
    public function show_post_offer_page(){
        return view('post_offer');
    }
}
