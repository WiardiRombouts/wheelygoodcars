@extends('layouts.app')
@section('main')
    <table class="table car_overview table-hover">

        <tbody>
            @foreach ($cars as $car)
                <tr class="table-striped">
                    <th class="table_item car_picture">
                        @if ($car->image == null)
                            <img src="{{ URL::asset('/images/placeholder-small.jpg') }}" alt="profile Pic" height="120"
                                width="135">
                        @else
                            
                            <img src="{{asset($car->image)}}" alt="" height="120"
                            width="135">
                        @endif
                    </th>
                    <td class="table_item">
                        <div class="kenteken license_plate_in_list d-flex flex-column align-items-center">
                            <div class="inset">
                                <div class="blue"></div>
                                <input type="text" name="license_plate" disabled="" value="{{ $car->license_plate }}"
                                    required="" />
                            </div>
                            <div class="sale_status">
                                @livewire('sales-status', ['car' => $car])
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="table-item">
                            <p>{{ $car->price }}</p>
                        </div>
                    </td>
                    <td>
                        <div class="table-item">
                            <p>{{ $car->make }} {{ $car->model }}</p>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @livewireScripts
@endsection
