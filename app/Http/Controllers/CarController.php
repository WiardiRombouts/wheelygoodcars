<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show_all_cars_page()
    {
        return view('cars');
    }
    
    public function show_post_offer_page()
    {
        return view('post_offer');
    }
    
    public function show_new_offer_page($license_plate)
    {
        return view('new_offer', compact($license_plate));
    }
    
    public function submit_license_plate_as(Request $request)
    {
        $license_plate =  $request->input('license_plate');

        // return redirect('show_new_offer_page', compact('license_plate'));
        return view('new_offer', [
            'license_plate' => $license_plate,
        ]);
    }

    public function submit_license_plate(Request $request)
    {
        $request;

        $license_plate = $request->input('license_plate');
        
        // $subTitle = "Thank you";
  
        return view('new_offer', compact('license_plate'));
    }



    public function process_new_offer(Request $request)
    {
        $request;
    }
}
