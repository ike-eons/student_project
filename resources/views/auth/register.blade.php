@extends('site.app')
@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"><i class="fa fa-user"></i> Account Registration</h4>
                </div>
                <div class="card-block py-2 px-4">
                    <form action="{{ route('register') }}" method="POST" role="form">
                        @csrf

                        {{--index field  --}}

                        <div class="form-group">
                            <label for="email" class="form-control-label">Index Number </label>
                            <input type="text" class="form-control @error('index_no') is-invalid @enderror" name="index_no" id="index_no" value="{{ old('inde_no') }}" placeholder="Enter Index Number">
                            
                            @error('index_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email Address">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div> --}}

                        {{--password field  --}}

                        <div class="form-group">
                            <label for="password" class="form-control-label">Password </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        {{-- password confirmation --}}

                         <div class="form-group">
                            <label for="password" class="form-control-label">Confirm Password </label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                            
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-success font-weight-bold">Login</button>
                        </div>
                    </form>
                </div>
                <div class="border-top card-body text-center"> Have an account? <a href=" {{ route('login') }}"> Login </a> </div>

            </div>
        </div>
    </div>
@endsection