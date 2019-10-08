@extends('site.app')

@section('content')
<style>
            html, body {
                
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
                color: black
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    <div class="container ">
        <div class="row">
            <div class="col-md-10 offset-md-2" style="margin-top: 50px">
                @if (Route::has('login'))
                    <div class="links py-5 ">
                        @auth
                            <h3><a class="nav-item" href="{{route('auth.clearance',auth()->id() )}}">CHECK CLEARANCE STATUS</a></h3>
                        @else
                            <h3><a class="nav-item" href="{{route('login')}}">CHECK CLEARANCE STATUS</a></h3> 
                        @endauth    
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection