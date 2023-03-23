@extends('layouts.app')

@section('main')
    <div class="d-flex justify-content-center">
        <form action="{{ Route('submit_license_plate') }}" method="post">
            @csrf
            <div class="kenteken">
                <div class="inset">
                    <div class="blue"></div>
                    <div class="license_plate_group"></div>
                    <input type="text" name="license_plate" placeholder="XP-004-T" required=""/>
                    
                </div>
                
            </div>

        </form>
    </div>
@endsection
