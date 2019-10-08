<div class="modal fade" id="addSubjectRegistrationModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <!-- modal header-->
                  <div class="modal-header bg-success text-white">
                      <h4 class="modal-title" id="addPostModalLabel">Select Subjects for Registration</h4>
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
                        <form action="{{ route('admin.registrations.store') }}" method="POST" role="form" enctype="multipart/form-data">
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
                                                        {{-- <input class="form-check-input" name="subjects[]" value="{{$subject->subject_code}}" type="checkbox"> --}}
                                                        <input class="form-check-input" name="subjects[]" value="{{$subject->id}}" type="checkbox">
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
