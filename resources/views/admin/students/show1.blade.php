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
          <div class="col-md-2">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="modal">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#addRegisterModal" data-target="#addRegisterModal" data-toggle="modal">Register Subjects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#FeeModal" data-target="#addFeeModal" data-toggle="modal">Fees</a></li>
                    <li class="nav-item"><a class="nav-link" href="#addttendanceModal" data-target="#addAttendanceModal" data-toggle="modal">Attendance</a></li>
                  </ul>
            </div>
          </div>

          <div class="col-md-10">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-user-circle" aria-hidden="true"></i> Student Details</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: 01/08/2019</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-7">
                  <table>
                    <tr>
                      <td class="text-right">Name <span class="pl-1">:</span></td>
                      <td class="pl-2 py-1"><strong>{{ $targetStudent->getName() }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-right">Index No. <span class="pl-1">:</span></td>
                      <td class="pl-2 py-1"><strong>{{ $targetStudent->index_no }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-right">Department <span class="pl-1">:</span></td>
                      <td class="pl-2 py-1"><strong>{{ $targetStudent->course->department->department_name }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-right">Course <span class="pl-1">:</span></td>
                      <td class="pl-2 py-1"><strong>{{ $targetStudent->course->course_name }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-right">Regular/Weekend <span class="pl-1">:</span></td>
                      <td class="pl-2 py-1"><strong>{{ $targetStudent->regular_or_weekend }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-right">Nationality <span class="pl-1">:</span></th>
                      <td class="pl-2 py-1"><strong>{{ $targetStudent->nationality }}</strong></td>
                    </tr>

                   
                   </table>
                </div>
                
                <div class="col-5">
                <img src="{{ asset('images/students/'.$targetStudent->image) }}" alt="Student Photo" class="image-fluid" />
                </div>

                
                
            
              </div>
            </section>
          </div>
          </div>
      </div>


       <!-- ADD POST MODAL -->
    <div class="modal fade" id="addRegisterModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <!-- modal header-->
                  <div class="modal-header bg-primary text-white">
                      <h4 class="modal-title" id="addPostModalLabel">Register Subjects</h4>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                  </div>

              <!-- modal body-->
                  <div class="modal-body">
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
                        <tbody>

                        {{-- <form action="{{route('admin.registrations.store',['id' => $targetStudent->id])}}" method="POST"> --}}
                        <form action="#" method="POST">
                          @csrf
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
                                                  <input class="form-check-input" name="subjects[]" value="{{$subject->subject_code}}" type="checkbox">
                                                  </label>
                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                        <input type="hidden" name="student_id" value="{{ $targetStudent->id }}">                            
                    </table>
                  </div>

              <!-- modal footer-->
                  <div class="modal-footer">
                          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Register Subjects</button>
                  </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
