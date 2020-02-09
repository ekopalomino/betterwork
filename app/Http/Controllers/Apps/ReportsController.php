<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeAttendance;
use iteos\Models\AttendanceTransaction;

class ReportsController extends Controller
{
    public function attendanceReport()
    {
    	return view('apps.pages.attendanceReport');
    }
}
