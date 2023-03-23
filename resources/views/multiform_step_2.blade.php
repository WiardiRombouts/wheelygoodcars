@extends('layouts.app')

@section('main')
    <div class="d-flex justify-content-end">
        <form action="{{ Route('process_new_car') }}" method="post">
            @csrf
            <div class="new-offer-heading">
                <h1>Nieuw aanbod</h1>
            </div>
            <div class="kenteken">
                <div class="inset">
                <div class="blue"></div>
                <input type="text" name="license_plate" value="{{ $license_plate }}" required=""/> 
                </div>
            </div>
            
            <div class="car-offer-form">
                <div class="row">
                    <div class="col-12">
                        <label for="brand">Merk</label>
                        <input type="text" class="form-control" name="brand" id="brand">
                    </div>
                    <div class="col-12">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" name="model" id="model">
                    </div>
                    <div class="col-4">
                        <label for="seats">Aantal Zitplaatsen</label>
                        <input type="number" class="form-control" name="seats" id="seats">
                    </div>
                    <div class="col-4">
                        <label for="doors">Aantal deuren</label>
                        <input type="number" class="form-control" name="doors" id="doors">
                    </div>
                    <div class="col-4">
                        <label for="weight">Gewicht</label>
                        <input type="number" class="form-control" name="weight" id="weight">
                    </div>
                    <div class="col-6">
                        <label for="production_year">Jaar van productie</label>
                        <input type="number" class="form-control" name="production_year" id="production_year">
                    </div>
                    <div class="col-6">
                        <label for="color">kleur</label>
                        <input type="text" class="form-control" name="color" id="color">
                    </div> 


                    <div class="form-group">
                        <label class="control-label" for="distance">Kilometerafstand</label>
                        <div class="input-group">
                            <input class="form-control" id="distance" name="distance" type="text"/>
                            <div class="input-group-addon-kg">
                                <input value="KM" class="form-control bg-white" name="KM/H" disabled>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="price">Vraagprijs</label>
                        <div class="input-group">
                            <div class="input-group-addon-euro">
                                <input value="€" class="form-control bg-white" name="euro" disabled>
                            </div>
                            <input class="form-control" id="price" name="price" type="text"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit-offer-form d-flex justify-content-center">
                <input type="submit" class="btn btn-primary border-dark" value="Aanbod afronden">
            </div>
        </form>
    </div>
    <h1></h1>
    
@endsection