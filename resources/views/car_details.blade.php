<?php
function timeAgo($timestamp)
{
    $datetime1 = new DateTime('now');
    $datetime2 = date_create($timestamp);
    $diff = date_diff($datetime1, $datetime2);
    $timemsg = '';
    if ($diff->y > 0) {
        $timemsg = $diff->y . ' year' . ($diff->y > 1 ? 's' : '');
    } elseif ($diff->m > 0) {
        $timemsg = $diff->m . ' month' . ($diff->m > 1 ? 's' : '');
    } elseif ($diff->d > 0) {
        $timemsg = $diff->d . ' day' . ($diff->d > 1 ? 's' : '');
    } elseif ($diff->h > 0) {
        $timemsg = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '');
    } elseif ($diff->i > 0) {
        $timemsg = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '');
    } elseif ($diff->s > 0) {
        $timemsg = $diff->s . ' second' . ($diff->s > 1 ? 's' : '');
    }

    $timemsg = $timemsg . ' ago';
    return $timemsg;
}
?>
@extends('layouts.app')

@section('main')
    {{-- CAR DETAILS CARD --}}

    <div class="card mb-3" style="max-width: 1300px;">
        <div class="row g-0">
            <div class="col-md-6">

                @if ($car->image == null)
                    <img src="{{ URL::asset('/images/placeholder-small.jpg') }}" alt="Placeholder image">
                @else
                    <img src="{{ asset($car->image) }}" alt="Image" width="640px">
                @endif

            </div>
            <div class="col-md-6">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="kenteken license_plate_in_card d-flex flex-column align-items-center">
                        <div class="inset">
                            <div class="blue"></div>
                            <input type="text" name="license_plate" disabled="" value="{{ $car->license_plate }}"
                                required="" />
                        </div>

                    </div>
                    <p class="card-text"><span class="fw-bold">Prijs: </span>€{{ $car->price }}</p>
                    <p class="card-text"><span class="fw-bold">Kilometerstand: </span>{{ $car->mileage }}km</p>
                    <p class="card-text"><span class="fw-bold">Bouwjaar: </span>{{ $car->production_year }}</p>
                    <p class="card-text"><span class="fw-bold">Kleur: </span>{{ $car->color }}</p>
                    <p class="card-text"><span class="fw-bold">Deuren: </span>{{ $car->doors }}</p>
                    <p class="card-text"><span class="fw-bold">Zitplaatsen: </span>{{ $car->seats }}</p>
                    <p class="card-text"><span class="fw-bold">Gewicht: </span>{{ $car->weight }}kg</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated <?php echo timeAgo($car->updated_at); ?></small></p>
                    <div class="home_button" style="max-width: 200px;">
                        <a href="{{ Route('show_all_cars_page') }}" class="btn btn-primary">Alle auto's</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CAR DETAILS CARD --}}
@endsection
