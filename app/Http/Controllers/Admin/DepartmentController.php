<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\contracts\DepartmentContract;
use App\Http\Controllers\BaseController;

class DepartmentController extends BaseController
{
    protected $departmentRepository;

    public function __construct(DepartmentContract $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

     public function index()
    {
        $departments= $this->departmentRepository->listDepartments();

        $this->setPageTitle('Departments', 'List of all Departments');
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        $departments = $this->departmentRepository->listDepartments('id', 'asc');

        $this->setPageTitle('Departments', 'Create Department');

        return view('admin.departments.create', compact('departments'));
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'department_name'      =>  'required|unique:departments|max:191',
        ]);

        $params = $request->except('_token');

        $department = $this->departmentRepository->createDepartment($params);

        if (!$department) {
            return $this->responseRedirectBack('Error occurred while creating department.', 'error', true, true);
        }
        return $this->responseRedirect('admin.departments.index', 'Department added successfully' ,'success',false, false);
    }

    public function show($id)
    {
        $targetDepartment = $this->departmentRepository->findDepartmentById($id);
        $this->setPageTitle('Departments', ' Department : '.$targetDepartment->department_name);
        
        return view('admin.departments.show', compact('targetDepartment'));
    }

     public function edit($id)
    {
        $targetDepartment = $this->departmentRepository->findDepartmentById($id);
        $departments = $this->departmentRepository->listDepartments();

        $this->setPageTitle('Departments', 'Edit Department : '.$targetDepartment->department_name);
        return view('admin.departments.edit', compact('department', 'targetDepartment'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'department_name'      =>  'required|unique:departments|max:191',
        ]);

        $params = $request->except('_token');
        
        $department = $this->departmentRepository->updateDepartment($params);

        if (!$department) {
            return $this->responseRedirectBack('Error occurred while updating department.', 'error', true, true);
        }
        return $this->responseRedirectBack('Department updated successfully' ,'success',false, false);
    }


     public function delete($id)
    {
        $department = $this->departmentRepository->deleteDepartment($id);

        if (!$department) {
            return $this->responseRedirectBack('Error occurred while deleting departments.', 'error', true, true);
        }
        return $this->responseRedirect('admin.departments.index', 'Departments deleted successfully' ,'success',false, false);
    }

}
