@extends('layouts.app')
@section('main')
    <table class="table personal_car_overview table-hover">

        <tbody>
            @foreach ($cars as $car)
                <tr class="table-striped">
                    <th class="table_item car_picture">
                        @if ($car->image == null)
                            <img src="{{ URL::asset('/images/placeholder-small.jpg') }}" alt="profile Pic" height="120"
                                width="135">
                        @else
                            {{ $car->image }}
                        @endif
                    </th>
                    <td class="table_item">
                        <div class="kenteken license_plate_in_list d-flex flex-column align-items-center">
                            <div class="inset">
                                <div class="blue"></div>
                                <input type="text" name="license_plate" disabled="" value="{{ $car->license_plate }}"
                                    required="" />
                            </div>
                            <div class="sale-status">
                                @isset($car->sold_at)
                                    <p class="status_text border border-dark rounded text-light bg-danger">VERKOCHT</p>
                                @endisset
                                @empty($car->sold_at)
                                    <p class="status_text border border-dark rounded text-light bg-success">TE KOOP</p>
                                @endempty
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
                    <td>
                        <div class="table-item">
                            <form action="{{ Route('car.destroy', $car->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
