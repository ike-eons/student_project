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
                <form action="{{ route('admin.subjects.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="subject_code">Subject Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subject_code') is-invalid @enderror" type="text" name="subject_code" id="subject_code" value="{{ old('subject_code') }}"/>
                            <span class="text-danger">@error('subject_code') {{ $message }} @enderror</span>
                        </div>

                         <div class="form-group">
                            <label class="control-label" for="name">Subject Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subject_name') is-invalid @enderror" type="text" name="subject_name" id="subject_name" value="{{ old('subject_name') }}"/>
                            <span class="text-danger">@error('subject_name') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Credit Hours <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('credit_hours') is-invalid @enderror" type="text" name="credit_hours" id="credit_hours" value="{{ old('credit_hours)') }}"/>
                            <span class="text-danger">@error('credit_hours') {{ $message }} @enderror</span>
                        </div>
                        
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Subject</button>
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
