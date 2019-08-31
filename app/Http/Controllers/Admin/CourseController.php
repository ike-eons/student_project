<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Contracts\CourseContract;

use App\Models\Department;

class CourseController extends BaseController
{
    protected $courseRepository;

    public function __construct(CourseContract $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->listCourses();

        $this->setPageTitle('courses', 'List of all Courses');
        return view('admin.courses.index', compact('courses'));
    }
    public function create()
    {
        $course = $this->courseRepository->listCourses('id', 'asc');

        $departments = Department::all();

        $this->setPageTitle('Course', 'Create Course');

        return view('admin.courses.create', compact('course','departments'));
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'course_code'      =>  'required|min:3|max:3',
            'course_name'      =>  'required|max:193',
            'department_id'    =>   'required|integer|not_in:0', 
        ]);

        $params = $request->except('_token');

        $course = $this->courseRepository->createCourse($params);

        if (!$course) {
            return $this->responseRedirectBack('Error occurred while creating course.', 'error', true, true);
        }
        return $this->responseRedirect('admin.courses.index', 'course added successfully' ,'success',false, false);
    }

     public function edit($id)
    {
        $targetCourse = $this->courseRepository->findCourseById($id);

        $courses = $this->courseRepository->listCourses();

        $departments = Department::all();

        $this->setPageTitle('course', 'Edit course : '.$targetCourse->course_name);

        return view('admin.courses.edit', compact('courses', 'targetCourse','departments'));
    }

    public function update(Request $request)
    {
         $this->validate($request, [
            'course_code'      =>  'required|min:3|max:3',
            'course_name'      =>  'required|max:193',
            'department_id'    =>   'required|integer|not_in:0', 

        ]);

        $params = $request->except('_token');

        $course = $this->courseRepository->updateCourse($params);


        if (!$course) {
            return $this->responseRedirectBack('Error occurred while updating course.', 'error', true, true);
        }
        return $this->responseRedirectBack('course updated successfully' ,'success',false, false);
    }


     public function delete($id)
    {
        $course = $this->courseRepository->deleteCourse($id);

        if (!$course) {
            return $this->responseRedirectBack('Error occurred while deleting course.', 'error', true, true);
        }
        return $this->responseRedirect('admin.courses.index', 'course deleted successfully' ,'success',false, false);
    }
}
