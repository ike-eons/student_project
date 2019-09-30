<?php

namespace App\Http\Controllers\Admin;


use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class SubjectRegistrationController extends Controller
{
    public function loadSubjects()
    {
        $subjects = Subject::all();

        return response()->json($subjects);
    }

    public function studentRegistration(Request $request)
    {
        // $student = Student::findOrFail($request->data);

        // return response()->json($student->subjects);
    }

    public function addSubject()
    {
        $student = Student::find(1);

        if($student)
        {
            $subjectregistration = new SubjectRegistration();
        }
    }

    public function deleteSubject()
    {
        
    }
}
