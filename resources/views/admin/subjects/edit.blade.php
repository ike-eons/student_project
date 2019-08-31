@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.subjects.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                          <div class="form-group">
                            <label class="control-label" for="subject_code">Subject Code<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subject_code') is-invalid @enderror" type="text" name="subject_code" id="subject_code" value="{{ $targetSubject->subject_code }}"/>
                            <input type="hidden" name="id" value="{{ $targetSubject->id }}">
                            <span class="text-danger">@error('subject_code') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="subject_name">Subject Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subject_name') is-invalid @enderror" type="text" name="subject_name" id="name" value="{{ $targetSubject->subject_name }}"/>
                            <span class="text-danger">@error('subject_name') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="credit_hours">Credit Hours<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('credit_hours') is-invalid @enderror" type="text" name="credit_hours" id="credit_hours" value="{{$targetSubject->credit_hours }}"/>
                            <span class="text-danger">@error('credit_hours') {{ $message }} @enderror</span>
                        </div>

                      
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save department</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.subjects.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
