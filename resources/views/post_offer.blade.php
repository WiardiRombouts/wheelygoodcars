@extends('layouts.app')

@section('main')
    <div class="d-flex justify-content-center">
        <form action="">
            <div class="kenteken">
                <div class="inset">
                <div class="blue"></div>
                <input type="text" placeholder="XP-004-T" required=""/> 
                </div>
            </div>
            <div class="submit-license-plate d-flex justify-content-center">
                <input type="submit" class="btn btn-primary border-dark">
            </div>
        </form>
    </div>
@endsection
