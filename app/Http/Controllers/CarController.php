<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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



    // public function submit_license_plate_as(Request $request)
    // {
    //     $license_plate =  $request->input('license_plate');

    //     // return redirect('show_new_offer_page', compact('license_plate'));
    //     return view('new_offer', [
    //         'license_plate' => $license_plate,
    //     ]);
    // }



    public function destroy($car_id)
    {
        $ticket = Car::findorFail($car_id);
        $ticket->delete();

        return back();
    }



    public function show_personal_cars()
    {
        $myCars = Auth::user()->cars;

        return view('personal_cars')->with('cars', $myCars);
    }

    public function car_details($car_id)
    {
        $car = Car::find($car_id);

        return view('car_details', compact('car'));
    }

    // public function submit_license_plate(Request $request)
    // {

    //     $request;

    //     $license_plate = $request->input('license_plate');

    //     // $subTitle = "Thank you";

    //     return view('multiform_step_2', compact('license_plate'));
    // }

    // RDW API Functions
    public function submit_license_plate(Request $request)
    {

        $request;
        $license_plate = $request->input('license_plate');
        $app_token = 'UEa1jOQL14JOaeu9oeYk71Xfa';
        // $url = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken='. strtoupper($license_plate);
        $url = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=' . strtoupper($license_plate);
        $count = 0;

        $method = "GET";
        $data = false;

        $curl = curl_init();
        // Set url
        curl_setopt($curl, CURLOPT_URL, $url);

        switch ($method) {
            case 'GET':
                // make sure its a GET
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                // Set header authorization
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Accept: application/json',
                    'Accept: application/pdf',
                    'X-App-Token: ' . $app_token,
                ));
                // $response = curl_exec($curl); // Automatically shows the response
                // $response = json_decode($response, true);

                curl_close($curl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                if (curl_exec($curl) === false) {
                    $temp = curl_error($curl);
                } else {
                    $temp = json_decode(curl_exec($curl));
                }
                curl_close($curl);

                if (isset($temp->d->__next)) {
                    $url = $temp->d->__next;
                } else {
                    $url = null;
                }

                if (isset($temp->d->results)) {
                    $response[$count] = $temp->d->results;
                    $count++;
                }

                // Genneral responses
                $license_plate = $temp[0]->kenteken;
                $make = $temp[0]->merk;
                $model = $temp[0]->handelsbenaming;
                $seats = $temp[0]->aantal_zitplaatsen;
                $doors = $temp[0]->aantal_deuren;
                $weight = $temp[0]->massa_rijklaar;
                $color = $temp[0]->eerste_kleur;
                
                // Production year response
                $production_year_string = ''. $temp[0]->datum_eerste_toelating[0] . $temp[0]->datum_eerste_toelating[1] . $temp[0]->datum_eerste_toelating[2] . $temp[0]->datum_eerste_toelating[3];
                $production_year = (int) $production_year_string;
                // $production_year = $temp[0]->
                
                // return redirect()->route('multistep_form_step_2', compact('api_car'));
                return view('multiform_step_2', compact('license_plate', 'make', 'model', 'seats', 'doors', 'weight', 'production_year',  'color'));
        }
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

        Storage::makeDirectory('public/images');
        $src = Storage::putFile('public/images', $request->file('image'));
        $src = str_replace('public', 'storage', $src);
        $newCar->image = $src;


        $newCar->save();

        return redirect('/');
    }
}
