<?php
function timeAgo($timestamp)
{
    $datetime1 = new DateTime('now');
    $datetime2 = date_create($timestamp);
    $diff = date_diff($datetime1, $datetime2);
    $timemsg = '';
    if ($diff->y > 0) {
        $timemsg = $diff->y . ' year' . ($diff->y > 1 ? "s" : '');
    } elseif ($diff->m > 0) {
        $timemsg = $diff->m . ' month' . ($diff->m > 1 ? "s" : '');
    } elseif ($diff->d > 0) {
        $timemsg = $diff->d . ' day' . ($diff->d > 1 ? "s" : '');
    } elseif ($diff->h > 0) {
        $timemsg = $diff->h . ' hour' . ($diff->h > 1 ? "s" : '');
    } elseif ($diff->i > 0) {
        $timemsg = $diff->i . ' minute' . ($diff->i > 1 ? "s" : '');
    } elseif ($diff->s > 0) {
        $timemsg = $diff->s . ' second' . ($diff->s > 1 ? "s" : '');
    }

    $timemsg = $timemsg . ' ago';
    return $timemsg;
}
?>
@extends('layouts.app')
@section('main')
    <table class="table car_overview table-hover">

        <tbody>
            @foreach ($cars as $car)
                @if ($car->sold_at == null)
                    <tr class="table-striped">
                        <th class="table_item car_picture">
                            @if ($car->image == null)
                                <img src="{{ URL::asset('/images/placeholder-small.jpg') }}" alt="profile Pic" height="120"
                                    width="135">
                            @else
                                <img src="{{ asset($car->image) }}" alt="" height="120" width="135">
                            @endif
                        </th>
                        <td class="table_item">
                            <div class="kenteken license_plate_in_list d-flex flex-column align-items-center">
                                <div class="inset">
                                    <div class="blue"></div>
                                    <input type="text" name="license_plate" disabled=""
                                        value="{{ $car->license_plate }}" required="" />
                                </div>

                            </div>
                        </td>
                        <td>
                            <div class="table-item">
                                <p>€{{ $car->price }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="table-item">
                                <p>{{ $car->make }} {{ $car->model }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="table-item">
                                <form action="">
                                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                                    <button type="submit" class="btn"><i class="bi bi-search"></i></button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    {{-- CAR DETAILS CARD --}}
                    
                    <div class="card mb-3" style="max-width: 1300px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{ URL::asset('/images/placeholder-small.jpg') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="kenteken license_plate_in_card d-flex flex-column align-items-center">
                                        <div class="inset">
                                            <div class="blue"></div>
                                            <input type="text" name="license_plate" disabled=""
                                                value="{{ $car->license_plate }}" required="" />
                                        </div>
        
                                    </div>
                                    <p class="card-text"><span class="fw-bold">Prijs: </span>€{{ $car->price }}</p>
                                    <p class="card-text"><span class="fw-bold">Kilometerstand: </span>{{ $car->mileage }}km</p>
                                    <p class="card-text"><span class="fw-bold">Bouwjaar: </span>{{ $car->production_year }}</p>
                                    <p class="card-text"><span class="fw-bold">Kleur: </span>{{ $car->color }}</p>
                                    <p class="card-text"><span class="fw-bold">Deuren: </span>{{ $car->doors }}</p>
                                    <p class="card-text"><span class="fw-bold">Zitplaatsen: </span>{{ $car->seats }}</p>
                                    <p class="card-text"><span class="fw-bold">Gewicht: </span>{{ $car->weight }}kg</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated <?php echo timeAgo($car->updated_at); ?></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- CAR DETAILS CARD --}}
                @endif
            @endforeach

        </tbody>
    </table>
    @livewireScripts
@endsection
