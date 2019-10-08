@extends('site.app')
@section('content')

    <section class="container">
        <!-- CLEARANCE VALIDATION SECTION  -->
            <div  class="clearance pt-5">
            <div class="container">
                <div class="row">
                <div class="offset-2 col-8">
                    <p class="validate-clearance text-white text-center py-3 display-5 bg-success">Minimum Fee Balance <i class="fa fa-check pl-5"></i></p>
                    <p class="validate-clearance text-white text-center py-3 display-5 bg-success">Library Clearance <i class="fa fa-check pl-5"></i></p>
                    <p class="validate-clearance text-white text-center py-3 display-5 bg-danger">Eligibility: 7 of 8 Register Course due to Attendance  <i class="fa fa-close pl-5"></i></p>
                </div>
                </div>
                <div class="row mt-5">
                <div class="offset-4 col-4">
                <button class="btn btn-block btn-lg text-white btn-dark"><a href="{{route('auth.hallticket',auth()->id())}}" class="nav-link text-white">Proceed To Print Hall-Ticket</a></button>
                </div>
                </div>
            </div>
            </div>
    </section>
@endsection