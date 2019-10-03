<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\contracts\SubjectContract;

class SubjectController extends BaseController
{
    protected $subjectRepository;

    public function __construct(SubjectContract $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

     public function index()
    {
        $subjects= $this->subjectRepository->listSubjects();

        $this->setPageTitle('Subjects', 'List of all Subjects');
        return view('admin.subjects.index', compact('subjects'));
    }

    public function loadsubjects()
    {
        $subjects = $this->subjectRepository->listSubjects();

        return  response()->json($subjects);
    }

    public function create()
    {
        $subject = $this->subjectRepository->listSubjects('id', 'asc');

        $this->setPageTitle('Subject', 'Create Subject');

        return view('admin.subjects.create', compact('subject'));
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'subject_code'      =>  'required|min:6|unique:subjects|max:6',
            'subject_name'      =>  'required|max:191',
            'credit_hours'      =>  'required|integer',
        ]);

        $params = $request->except('_token');

        $subject = $this->subjectRepository->createSubject($params);

        if (!$subject) {
            return $this->responseRedirectBack('Error occurred while creating subject.', 'error', true, true);
        }
        return $this->responseRedirect('admin.subjects.index', 'subject added successfully' ,'success',false, false);
    }

     public function edit($id)
    {
        $targetSubject = $this->subjectRepository->findSubjectById($id);
        
        $subject = $this->subjectRepository->listSubjects();

        $this->setPageTitle('Subject', 'Edit subject : '.$targetSubject->subject_name);
        return view('admin.subjects.edit', compact('subject', 'targetSubject'));
    }

    public function update(Request $request)
    {
         $this->validate($request, [
            'subject_code'      =>  'required|min:6|max:6',
            'subject_name'      =>  'required|max:191',
            'credit_hours'      =>  'required|integer',
        ]);

        $params = $request->except('_token');

        $subject = $this->subjectRepository->updateSubject($params);

        if (!$subject) {
            return $this->responseRedirectBack('Error occurred while updating subject.', 'error', true, true);
        }
        return $this->responseRedirectBack('Subject updated successfully' ,'success',false, false);
    }


     public function delete($id)
    {
        $subject = $this->subjectRepository->deleteSubject($id);

        if (!$subject) {
            return $this->responseRedirectBack('Error occurred while deleting Subject.', 'error', true, true);
        }
        return $this->responseRedirect('admin.subjects.index', 'Subject deleted successfully' ,'success',false, false);
    }
}
