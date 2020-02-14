<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeAttendance;
use iteos\Models\AttendanceTransaction;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function attendanceReport()
    {
    	return view('apps.pages.attendanceReport');
    }

    public function attendanceProcess(Request $request)
    {
    	$empID = $request->input('employee_id');
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $dates = $request->input('date_range');
        $dateRange = explode('-',$dates);
        $startDate = Carbon::parse($dateRange[0]);
        $endDate = Carbon::parse($dateRange[1]);
        
        $data = EmployeeAttendance::join('employees','employees.id','employee_attendances.employee_id')
                                    ->join('attendance_transactions','attendance_transactions.attendance_id','employee_attendances.id')
                                    ->where('employees.employee_no',$empID)
                                    ->orWhere('employees.first_name',$firstName)
                                    ->orWhere('employees.last_name',$lastName)
                                    ->orWhere('employee_attendances.created_at','>=',$startDate)
                                    ->where('employee_attendances.created_at','<=',$endDate)
                                    ->get();

        return view('apps.reports.attendanceReport',compact('data','empID'));
    }
}
