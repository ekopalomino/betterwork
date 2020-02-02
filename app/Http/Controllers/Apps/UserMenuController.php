<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeAttendance;
use iteos\Models\EmployeeLeave;
use iteos\Models\LeaveType;
use Auth;
use Carbon\Carbon;

class UserMenuController extends Controller
{
    public function index()
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();
    	$getAttendance = EmployeeAttendance::where('employee_id',$getEmployee->id)->orderBy('updated_at','DESC')->first();
    	
    	return view('apps.pages.userHome',compact('getEmployee','getAttendance'));
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

    public function leaveIndex()
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();
    	$data = EmployeeLeave::orderBy('created_at','DESC')->get();
    	$types = LeaveType::pluck('leave_name','id')->toArray();

    	return view('apps.pages.myLeave',compact('getEmployee','data','types'));
    }

    public function leaveRequest(Request $request)
    {
    	$this->validate($request, [
            'request_type' => 'required',
            'request_period' => 'required',
            'notes' => 'required',
        ]);
    	$dates = explode('-',$request->input('request_period'));

    	$data = EmployeeLeave::create([
    		'employee_id' => $request->input('employee_id'),
    		'leave_type' => $request->input('request_type'),
    		'notes' => $request->input('notes'),
    		'leave_start' => $dates[0],
    		'leave_end' => $dates[1],
    		'status_id' => 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be',
    	]);

    	return redirect()->route('myLeave.index');
    }
}
