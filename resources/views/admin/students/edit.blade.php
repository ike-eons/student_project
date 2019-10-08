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
                <form action="{{ route('admin.students.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                          <div class="form-group">
                            <label class="control-label" for="index_no">Index Number<span class="m-l-5 text-danger"> *</span></label>
                            <input type="hidden" name="id" value="{{ $targetStudent->id }}">
                          <input class="form-control @error('index_no') is-invalid @enderror" type="text" name="index_no" id="index_no" value="{{ $targetStudent->index_no }}"/>
                            <span class="text-danger">@error('index_no') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="name">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" id="firstname" value="{{ $targetStudent->firstname }}"/>
                            <span class="text-danger">@error('firstname') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="middlename">Middle Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('middlename') is-invalid @enderror" type="text" name="middlename" id="middlename" value="{{ $targetStudent->middlename }}"/>
                            <span class="text-danger">@error('middlename') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="lastname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" id="lastname" value="{{ $targetStudent->lastname }}"/>
                            <span class="text-danger">@error('lastname') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="course_id">Course Name <span class="m-l-5 text-danger"> *</span></label>
                           
                             <select class="form-control" name="course_id" id="course_id">
                                <option value="0">Select a Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" 
                                        @if($course->id == $targetStudent->course_id) 
                                       {{ 'selected'}}
                                        @endif
                                        >
                                            {{ $course->course_name }}
                                    </option>
                                @endforeach
                            </select>
                        <span class="text-danger">@error('course_id') {{ $message }} @enderror</span>
                            
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="nationality">Nationality <span class="m-l-5 text-danger"> *</span></label>

                            <select class="form-control" name="nationality" id="nationality">
                                <option value="">SELECT NATIONALITY</option>

                                @foreach( $targetStudent->getNationalityOptions() as $nationalityOptionsKey => $nationalityOptionsValue )
                                    <option value="{{ $nationalityOptionsKey }}" 
                                        @if ($targetStudent->nationality == $nationalityOptionsValue)
                                            {{ 'selected'}}
                                        @endif
                                    >
        
                                        {{$nationalityOptionsValue}}
                                    </option>
                                @endforeach
                            </select>
                            
                            <span class="text-danger">@error('nationality') {{ $message }} @enderror</span>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Regular/Weekend</label>
                
                            <div class="form-check">
                                <label class="form-check-label">
                                    @foreach ($targetStudent->getRegularOrWeekendOptions() as $regularOrWeekendKey => $regularOrWeekendValue)
                                        <input class="form-check-input" type="radio" value="{{ $regularOrWeekendKey }}" name="regular_or_weekend"
                                            {{ $regularOrWeekendValue == $targetStudent->regular_or_weekend ? 'checked' : '' }}  
                                        
                                        /> {{ $regularOrWeekendValue}} 
                                    @endforeach
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                @if($targetStudent->image != null)
                                    <div class="-md-2">
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/students'.$targetStudent->image) }}" id="image" class="img-fluid" alt="img">
                                        </figure>
                                    </div>
                                @endif                            
                            </div>
                            <div class="col-md-10">
                                <label class="control-label">Image</label>
                                <input class="form-control @error('logo') is-invalid @enderror" type="file" id="image" name="image"/>
                                @error('image') {{ $message }} @enderror
                            </div>
                           
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>SAVE CHANGES</button>
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
