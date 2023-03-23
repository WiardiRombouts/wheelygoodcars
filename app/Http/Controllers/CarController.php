<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{
    public function show_all_cars_page()
    {
        $cars = Car::all();

        return view('cars', [
            'cars' => $cars,
        ]);
    }

    public function show_new_license_plate_page()
    {
        return view('license_plate');
    }

    public function show_new_car_form($license_plate)
    {
        return view('multiform_step_2', compact($license_plate));
    }

    // public function submit_license_plate_as(Request $request)
    // {
    //     $license_plate =  $request->input('license_plate');

    //     // return redirect('show_new_offer_page', compact('license_plate'));
    //     return view('new_offer', [
    //         'license_plate' => $license_plate,
    //     ]);
    // }

    public function submit_license_plate(Request $request)
    {

        $request;

        $license_plate = $request->input('license_plate');

        // $subTitle = "Thank you";
        
        return view('multiform_step_2', compact('license_plate'));
    }

    public function destroy($car_id){
        $ticket = Car::findorFail($car_id);
        $ticket->delete();

        return back();
    }

    public function process_new_car(Request $request)
    {
        $request;

        $newCar = new Car();


        
        $newCar->user_id = Auth::user()->id;
        $newCar->license_plate = $request->input('license_plate');
        $newCar->make = $request->input('brand');
        $newCar->model = $request->input('model');
        $newCar->price = $request->input('price');
        $newCar->mileage = $request->input('distance');
        $newCar->seats = $request->input('seats');
        $newCar->doors = $request->input('doors');
        $newCar->production_year = $request->input('production_year');
        $newCar->weight = $request->input('weight');
        $newCar->color = $request->input('color');

        $newCar->save();

        return redirect('/');
    }

    public function show_personal_cars()
    {
        $myCars = Auth::user()->cars;

        return view('personal_cars')->with('cars', $myCars);
    }
}
