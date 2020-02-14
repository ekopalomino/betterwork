<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeAttendance;
use iteos\Models\AttendanceTransaction;
use Carbon\Carbon;
use DB;
use Route;
use PDF;

class ReportsController extends Controller
{
    public function attendanceReport()
    {
    	return view('apps.pages.attendanceReport');
    }

    public function attendanceProcess(Request $request)
    {
    	$dates = $request->input('date_range');
        $dateRange = explode('-',$dates);
        $startDate = Carbon::parse($dateRange[0]);
        $endDate = Carbon::parse($dateRange[1]);
        $difference = $endDate->diff($startDate);
        $date_diff = $difference->format('%a');
        
        $data = DB::table('employees')
                    ->leftJoin('employee_attendances','employee_attendances.employee_id','employees.id')
                    ->leftJoin('employee_leaves','employee_leaves.employee_id','employees.id')
                    ->leftJoin('leave_transactions','leave_transactions.leave_id','employee_leaves.id')
                    ->where('employee_attendances.created_at','>=',$startDate)
                    ->where('employee_attendances.updated_at','<=',$endDate)
                    ->select(DB::raw('employees.employee_no as ID'),DB::raw('concat(employees.first_name," ",employees.last_name) as Name'),
                            DB::raw('sum(employee_attendances.working_hour) as Hours'),DB::raw('count(employee_attendances.id) as Present'),
                            DB::raw('count(leave_transactions.id) as Leaves'))
                    ->groupBy('employees.employee_no','employees.first_name','employees.last_name')
                    ->get();     
                                   
        return view('apps.reports.attendanceReport',compact('data','startDate','endDate','date_diff'));
    }

    public function attendanceDetail($id,$startDate,$endDate)
    {
        $id = Route::current()->parameter('ID');
        $start = Route::current()->parameter('startDate');
        $end = Route::current()->parameter('endDate');

        $employee = Employee::where('employee_no',$id)->first();
        $total = EmployeeAttendance::where('employee_id',$employee->id)
                                    ->where('created_at','>=',$start)
                                    ->where('updated_at','<=',$end)
                                    ->sum('working_hour');
        
        $data = DB::table('employees')
                    ->leftJoin('employee_attendances','employee_attendances.employee_id','employees.id')
                    ->leftJoin('attendance_transactions','attendance_transactions.attendance_id','employee_attendances.id')
                    ->where('employees.employee_no',$id)
                    ->where('employee_attendances.created_at','>=',$startDate)
                    ->where('employee_attendances.updated_at','<=',$endDate)
                    ->select('employees.id','employee_attendances.created_at','attendance_transactions.clock_in','attendance_transactions.clock_out','employee_attendances.working_hour','attendance_transactions.notes')
                    ->orderBy('employee_attendances.created_at','ASC')
                    ->get();

        return view('apps.reports.attendanceReportDetail',compact('data','employee','start','end','total'));
    }

    public function attendancePrint($id,$startDate,$endDate)
    {
        $id = Route::current()->parameter('ID');
        $start = Route::current()->parameter('startDate');
        $end = Route::current()->parameter('endDate');

        $employee = Employee::where('employee_no',$id)->first();
        $total = EmployeeAttendance::where('employee_id',$employee->id)
                                    ->where('created_at','>=',$start)
                                    ->where('updated_at','<=',$end)
                                    ->sum('working_hour');
        
        $data = DB::table('employees')
                    ->leftJoin('employee_attendances','employee_attendances.employee_id','employees.id')
                    ->leftJoin('attendance_transactions','attendance_transactions.attendance_id','employee_attendances.id')
                    ->where('employees.employee_no',$id)
                    ->where('employee_attendances.created_at','>=',$startDate)
                    ->where('employee_attendances.updated_at','<=',$endDate)
                    ->select('employees.id','employee_attendances.created_at','attendance_transactions.clock_in','attendance_transactions.clock_out','employee_attendances.working_hour','attendance_transactions.notes')
                    ->orderBy('employee_attendances.created_at','ASC')
                    ->get();

        return view('apps.reports.attendanceReportDetailPrint',compact('data','employee','start','end','total'));
    }

    public function attendancePdf($id,$startDate,$endDate)
    {
        $id = Route::current()->parameter('ID');
        $start = Route::current()->parameter('startDate');
        $end = Route::current()->parameter('endDate');

        $employee = Employee::where('employee_no',$id)->first();
        $total = EmployeeAttendance::where('employee_id',$employee->id)
                                    ->where('created_at','>=',$start)
                                    ->where('updated_at','<=',$end)
                                    ->sum('working_hour');
        $empName = ($employee->first_name).''.($employee->last_name);
        $data = DB::table('employees')
                    ->leftJoin('employee_attendances','employee_attendances.employee_id','employees.id')
                    ->leftJoin('attendance_transactions','attendance_transactions.attendance_id','employee_attendances.id')
                    ->where('employees.employee_no',$id)
                    ->where('employee_attendances.created_at','>=',$startDate)
                    ->where('employee_attendances.updated_at','<=',$endDate)
                    ->select('employees.id','employee_attendances.created_at','attendance_transactions.clock_in','attendance_transactions.clock_out','employee_attendances.working_hour','attendance_transactions.notes')
                    ->orderBy('employee_attendances.created_at','ASC')
                    ->get();

        $filename = $empName;
        
        $pdf = PDF::loadview('apps.reports.attendanceReportDetailPdf',compact('data','employee','start','end','total'));
        
        return $pdf->download(''.$filename.'.pdf');
    }

}
