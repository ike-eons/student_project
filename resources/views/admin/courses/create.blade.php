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
                <form action="{{ route('admin.courses.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Course Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('course_code') is-invalid @enderror" type="text" name="course_code" id="course_name" value="{{ old('course_code') }}"/>
                            <span class="text-danger">@error('course_code') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Course Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('course_name') is-invalid @enderror" type="text" name="course_name" id="course_name" value="{{ old('course_name') }}"/>
                            <span class="text-danger">@error('course_name') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="department_id">Department Name <span class="m-l-5 text-danger"> *</span></label>
                           
                            <select class="form-control custom-select mt-15 @error('department_id') is-valid @enderror " name="department_id" id="department_id">
                                <option value="0">Select a Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}  ">
                                            {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                        <span class="text-danger">@error('department_id') {{ $message }} @enderror</span>
                            
                        </div>
                        
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Course</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.courses.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
