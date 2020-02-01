<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeFamily;
use iteos\Models\EmployeeEducation;
use iteos\Models\EmployeeTraining;
use iteos\Models\EmployeeService;
use iteos\Models\EmployeePosition;

class HumanResourcesController extends Controller
{
    public function index()
    {
    	return view('apps.pages.humanResourceHome');
    }

    public function employeeIndex()
    {
        $data = Employee::orderBy('name','ASC')->get();

    	return view('apps.pages.employeeIndex',compact('data'));
    }

    public function employeeCreate()
    {
        $grades = EmployeePosition::pluck('position_name','position_name')->toArray();

        return view('apps.input.employee',compact('grades'));
    }

    public function attendanceIndex()
    {
    	return view('apps.pages.attendanceIndex');
    }

    public function requestIndex()
    {
    	return view('apps.pages.requestIndex');
    }

    public function appraisalIndex()
    {
        return view('apps.pages.appraisalIndex');
    }
}

