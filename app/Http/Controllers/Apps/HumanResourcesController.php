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
use iteos\Models\Location;
use Hash;
use Auth;

class HumanResourcesController extends Controller
{
    public function index()
    {
    	return view('apps.pages.humanResourceHome');
    }

    public function employeeIndex()
    {
        $data = Employee::orderBy('employee_id','ASC')->get();

    	return view('apps.pages.employeeIndex',compact('data'));
    }

    public function employeeCreate()
    {
        $grades = EmployeePosition::pluck('position_name','position_name')->toArray();
        $cities = Location::pluck('city','city')->toArray();
        
        return view('apps.input.employee',compact('grades','cities'));
    }

    public function employeeStore(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_id' => 'required|unique:employees,employee_id',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'id_card' => 'required|numeric|min:16',
            'address' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email:rfc,dns|unique:employees,email',
            'picture' => 'required|image'
        ]);

        $file = $request->file('picture');
        $file_name = $request->input('employee_id');
        $size = $file->getSize();
        $ext = $file->getClientOriginalExtension();
        $destinationPath = public_path('/employees');
        $extension = $file->getClientOriginalExtension();
        $filename=$file_name.'employee.'.$extension;
        $uploadSuccess = $request->file('picture')
        ->move($destinationPath, $filename);

        $input = [
            'employee_id' => $request->input('employee_id'), 
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'sex' => $request->input('sex'),
            'marital_status' => $request->input('marital_status'),
            'place_of_birth' => $request->input('place_of_birth'),
            'date_of_birth' => $request->input('date_of_birth'),
            'id_card' => $request->input('id_card'),
            'picture' => $filename,
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'created_by' => auth()->user()->id,
        ];

        $result = Employee::create($input);
        $userPassword = 'password';
        $name = $result->first_name.' '.$result->last_name;
        dd($name);
        $encryptPass = Hash::make($userPassword);
        $user = User::create([
            'name' => $name,
            'email' => $request->input('email'),
            'password' => $encryptPass,
        ]);
    }

    public function familyStore(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'relations' => 'required',
            'mobile' => 'required|numeric',
        ]);

        $input = [
            'employee_id' => $request->input('employee_id'), 
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'relations' => $request->input('relations'),
            'phone' => $request->input('phone'),
            'mobile' => $request->input('mobile'),
        ];
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

