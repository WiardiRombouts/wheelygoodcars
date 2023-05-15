@extends('layouts.app')

@section('main')
    <div class="d-flex justify-content-end">
        <form action="{{ Route('process_new_car') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="new-offer-heading">
                <h1>Nieuw aanbod</h1>
            </div>
            <div class="kenteken">
                <div class="inset">
                    <div class="blue"></div>
                    <input type="text" name="license_plate" value="{{ $license_plate }}" required="" />
                </div>
            </div>

            <div class="car-offer-form">
                <div class="row fw-bold">
                    <div class="col-2">
                        <label for="brand">Merk</label>
                        <input type="text" class="form-control" name="brand" id="brand"
                            value="<?php echo Str::ucfirst(strtolower($make)); ?>">
                    </div>
                    <div class="col-2">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" name="model" id="model"
                            value="<?php echo Str::ucfirst(strtolower($model)); ?>">
                    </div>
                    <div class="col-2">
                        <label for="production_year">Jaar van productie</label>
                        <input type="number" class="form-control" name="production_year" id="production_year"
                            value="{{ $production_year }}">
                    </div>
                    <div class="col-2">
                        <label for="color">kleur</label>
                        <input type="text" class="form-control" name="color" id="color"
                            value="<?php echo Str::ucfirst(strtolower($color)); ?>">
                    </div>
                    <div class="col-2">
                        <label for="seats">Aantal Zitplaatsen</label>
                        <input type="number" class="form-control" name="seats" id="seats"
                            value="{{ $seats }}">
                    </div>
                    <div class="col-2">
                        <label for="doors">Aantal deuren</label>
                        <input type="number" class="form-control" name="doors" id="doors"
                            value="{{ $doors }}">
                    </div>
                    <div class="col-2">
                        <label class="control-label" for="weight">Gewicht</label>
                        <div class="input-group">
                            <input class="form-control" id="weight" name="weight" type="text" value="{{$weight}}"/>
                            <div class="input-group-addon-kg">
                                <input value="g" class="form-control bg-white" style="max-width: 40px" name="KM/H"
                                    disabled>
                            </div>
                        </div>


                        
                    </div>
                    <div class="form-group col-2">
                        <label class="control-label" for="distance">Kilometerafstand</label>
                        <div class="input-group">
                            <input class="form-control" id="distance" name="distance" type="text" />
                            <div class="input-group-addon-kg">
                                <input value="KM" class="form-control bg-white" style="max-width: 51px" name="KM/H"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="image">Foto</label>
                        <input type="file" class="form-control" name="image" id="image"
                            accept="image/png, image/gif, image/jpeg">
                    </div>
                    <div class="form-group col-2">
                        <label class="control-label" for="price">Vraagprijs</label>
                        <div class="input-group">
                            <div class="input-group-addon-euro">
                                <input value="€" class="form-control bg-white" style="max-width: 38px" name="euro"
                                    disabled>
                            </div>
                            <input class="form-control" id="price" name="price" type="text" />
                        </div>
                    </div>
                    <div class="form-group col-2">
                        <input type="submit" class="btn btn-primary form-control" style="margin-top: 24px;" value="Aanbod afronden">
                    </div>
                </div>
            </div>

        </form>
    </div>
    <h1></h1>
@endsection
