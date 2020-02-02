<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeAttendance;
use Auth;
use Carbon\Carbon;

class UserMenuController extends Controller
{
    public function index()
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();

    	return view('apps.pages.userHome',compact('getEmployee'));
    }

    public function clockIn(Request $request)
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();

    	$clockIn = EmployeeAttendance::create([
    		'employee_id' => $getEmployee->id,
    		'clock_in' => Carbon::now(),
    		'status_id' => 'f4f23f41-0588-4111-a881-a043cf355831',
    	]);

    	return redirect()->back();
    }

    public function clockOut(Request $request)
    {
    	$input = $request->all();
    	
    	
    	$getAttendance = EmployeeAttendance::where('employee_id',$request->input('employee_id'))
    										 ->where('status_id','f4f23f41-0588-4111-a881-a043cf355831')
    										 ->orderBy('updated_at','DESC')
    										 ->first();
    	$clockOut = $getAttendance->update([
    										'clock_out' => Carbon::now(),
    										'notes' => $request->input('notes'),
    										'status_id' => '2dc764a0-f110-4985-922d-0ffb81363899'
    									]);

    	return redirect()->back();
    }
}
