@extends('admin.app')
@section('title','Register Subjects')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Subjects Registration</h1>
            <p>select subjects to be registered</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    
                        {{-- <form action="{{route('admin.registrations.store',['id' => $targetStudent->id])}}" method="POST"> --}}
                        <form action="{{ route('admin.registrations.store') }}" method="POST" role="form" enctype="multipart/form-data">
                          @csrf

                        <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Code </th>
                                <th> Name </th>
                                <th> Credit Hours </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                          <input type="hidden" name="student_id" value="{{ $student->id }}">
                            @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->id }}</td>
                                        <td>{{ $subject->subject_code }}</td>
                                        <td>{{ $subject->subject_name }}</td>
                                        <td>{{ $subject->credit_hours }}</td>
                                        
                                        <td class="text-center">
                                            <div class="form-group">
                                                <div class="form-check">
                                                  <label class="form-check-label">
                                                  <input class="form-check-input" name="subjects[]" value="{{$subject->id}}" type="checkbox">
                                                  </label>
                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>                           
                    </table>
                
                <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Subject</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.students.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush