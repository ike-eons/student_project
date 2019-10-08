@extends('site.app')
@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"><i class="fa fa-user"></i> Account Login</h4>
                    <p class="text-center">Login to Print Hall-Ticket</p>
                </div>
                <div class="card-block py-2 px-4">
                    <form action="{{ route('login') }}" method="POST" role="form">
                        @csrf

                        {{--index field  --}}

                        <div class="form-group">
                            <label for="index_no" class="form-control-label">Index Number </label>
                            <input type="text" class="form-control @error('index_no') is-invalid @enderror" name="index_no" id="index_no" value="{{ old('index_no') }}" placeholder="Enter Index Number">
                            
                            @error('index_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        

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
                        
                        <div class="form-group row mr-auto">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{old('remember' ? 'checked' : '')}}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-success py-3 font-weight-bold">Login</button>
                        </div>
                    </form>
                </div>
                <div class="border-top card-body text-center"> Not registered yet? <a href=" {{ route('register') }}"> Register </a> </div>

            </div>
        </div>
    </div>
@endsection