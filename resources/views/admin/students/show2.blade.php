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
                    <li class="nav-item"><a class="nav-link active" href="#studentdetails" data-target="#studentdetails" data-toggle="tab">Student Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-target="#registeredsubjects" data-toggle="modal">Register Subjects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#FeeModal" data-target="#addFeeModal" data-toggle="tab">Fees</a></li>
                    <li class="nav-item"><a class="nav-link" href="#addttendanceModal" data-target="#addAttendanceModal" data-toggle="tab">Attendance</a></li>
                </ul>
            </div>
          </div>

          <div class="col-md-10">
                <div class="tab-content">
                    <div class="tab-pane active" id="studentdetails">
                        <div class="tile">
                            <section class="details">
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
          </div>
      </div>
   
      <div id="app">
        <subject-registrations :studentid="{{$targetStudent->id}}"></subject-registrations>
      </div>



@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
