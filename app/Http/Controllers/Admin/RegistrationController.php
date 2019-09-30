<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Registration;
use App\Contracts\StudentContract;
use App\Contracts\RegistrationContract;
use App\Http\Controllers\BaseController;


class RegistrationController extends BaseController
{
    protected $studentRepository;
    protected $registrationRepository;

     public function __construct(RegistrationContract $registrationRepository, StudentContract $studentRepository)
    {
        $this->registrationRepository = $registrationRepository;
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {

    }

    public function create($id)
    {
        $subjects = Subject::all();

        $student = $this->studentRepository->findStudentById($id);
    
        return view('admin.registrations.subjectregistration',compact('subjects','student'));

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id'   =>  'required|integer|unique:registrations',
        ]);
        
        $registration = new Registration();
        $registration->student_id = $request->input('student_id');
        //$subject = $request->input('subjects.0');
        $subjects = $request->input('subjects.*');
        $registration->subjects =implode($subjects,",");

        //dd($registration->subjects);

        $registration->save();

        if (!$registration) {
            return $this->responseRedirectBack('Error occurred while creating registration.', 'error', true, true);
        }
        return $this->responseRedirect('admin.students.index', 'Registration added successfully' ,'success',false, false);

    }

}
