<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\EmployeeGrievance;
use iteos\Models\GrievanceComment;
use Auth;

class GrievanceController extends Controller
{
    public function index()
    {
    	return view('apps.pages.grievanceHome');
    }

    public function grievanceData()
    {
    	$data = EmployeeGrievance::where('status_id','!=','6a787298-14f6-4d19-a7ee-99a3c8ed6466')->get();

    	return view('apps.pages.grievanceIndex',compact('data'));
    }

    public function managementData()
    {
    	$data = EmployeeGrievance::where('status_id','!=','6a787298-14f6-4d19-a7ee-99a3c8ed6466')->get();

    	return view('apps.pages.managementGrievance',compact('data'));
    }

    public function grievanceShow($id)
    {
    	$data = EmployeeGrievance::find($id);

    	return view('apps.show.grievanceData',compact('data'));
    }
}
