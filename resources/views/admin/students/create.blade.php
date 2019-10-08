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
                <form action="{{ route('admin.students.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                          <div class="form-group">
                            <label class="control-label" for="index_no">Index Number<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('index_no') is-invalid @enderror" type="text" name="index_no" id="index_no" value="{{ old('index_no') }}"/>
                            <span class="text-danger">@error('index_no') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="name">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"/>
                            <span class="text-danger">@error('firstname') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="middlename">Middle Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('middlename') is-invalid @enderror" type="text" name="middlename" id="middlename" value="{{ old('middlename') }}"/>
                            <span class="text-danger">@error('middlename') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="lastname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"/>
                            <span class="text-danger">@error('lastname') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="course_id">Course Name <span class="m-l-5 text-danger"> *</span></label>
                           
                            <select class="form-control custom-select mt-15 @error('course_id') is-valid @enderror " name="course_id" id="course_id">
                                <option value="">Select a Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}  ">
                                                {{ $course->course_name }}
                                        </option>
                                    @endforeach
                            </select>
                            <span class="text-danger">@error('course_id') {{ $message }} @enderror</span>
                            
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="nationality">Nationality <span class="m-l-5 text-danger"> *</span></label>
                           
                            <select class="form-control custom-select mt-15 @error('nationality') is-valid @enderror " name="nationality" id="nationality">
                                <option value="">Select Country</option>
                                    <option value="GHANAIAN">GHANAIAN</option>
                                    <option value="GHANAIAN">NIGERIAN</option>
                                    <option value="GHANAIAN">OTHERS</option>    
                            </select>
                            <span class="text-danger">@error('natioanality') {{ $message }} @enderror</span>
                            
                        </div>

                        {{-- <div class="form-group">
                            <label class="control-label" for="nationality">Nationality <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('nationality') is-invalid @enderror" type="text" name="nationality" id="nationality" value="{{ old('nationality') }}"/>
                            <span class="text-danger">@error('nationality') {{ $message }} @enderror</span>
                        </div> --}}


                        <div class="form-group">
                            <label class="control-label">Regular/Weekend</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="1" name="regular_or_weekend">Regular
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="0" name="regular_or_weekend">Weekend
                                </label>
                            </div>
                        </div>
                        
                        

                        <div class="form-group">
                            <label class="control-label">Upload Image</label>
                            <input class="form-control @error('image') is-invalid @enderror " name="image" id="image" type="file">
                            <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save department</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.students.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
