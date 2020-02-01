<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\User;
use iteos\Models\EmployeeFamily;
use iteos\Models\EmployeeEducation;
use iteos\Models\EmployeeTraining;
use iteos\Models\EmployeeTrainingFile;
use iteos\Models\EmployeeService;
use iteos\Models\EmployeePosition;
use iteos\Models\Location;
use Hash;
use Auth;
use Illuminate\Support\Facades\Input;

class HumanResourcesController extends Controller
{
    public function index()
    {
    	return view('apps.pages.humanResourceHome');
    }

    public function employeeIndex()
    {
        $data = Employee::orderBy('employee_no','ASC')->paginate(6);
        
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
                'employee_no' => 'required|unique:employees,employee_no',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required',
                'id_card' => 'required|numeric|min:16',
                'address' => 'required',
                'mobile' => 'required|numeric',
                'email' => 'required|email:rfc,dns|unique:employees,email',
                'picture' => 'required|image'
            ]);

            $file = $request->file('picture');
            $file_name = $request->input('employee_no');
            $size = $file->getSize();
            $ext = $file->getClientOriginalExtension();
            $destinationPath = public_path('/employees');
            $extension = $file->getClientOriginalExtension();
            $filename=$file_name.''.$extension;
            $uploadSuccess = $request->file('picture')
            ->move($destinationPath, $filename);

            $input = [
                'employee_no' => $request->input('employee_no'), 
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
            
            $encryptPass = Hash::make($userPassword);
            $user = User::create([
                'name' => $name,
                'email' => $request->input('email'),
                'password' => $encryptPass,
            ]);

            return redirect()->route('employee.index');
        
    }

    public function employeeEdit($id)
    {
        $data = Employee::find($id);
        $grades = EmployeePosition::pluck('position_name','position_name')->toArray();
        $cities = Location::pluck('city','city')->toArray();
        
        return view('apps.edit.employee',compact('grades','cities','data'));
    }

    public function employeeUpdate(Request $request,$id)
    {
        $data = Employee::find($id);
        if($request->has('profile')) {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $file_name = $request->input('employee_id');
                $size = $file->getSize();
                $ext = $file->getClientOriginalExtension();
                $destinationPath = public_path('/employees');
                $extension = $file->getClientOriginalExtension();
                $filename=$file_name.''.$extension;
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
                    'updated_by' => auth()->user()->id,
                ];
            } else {
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
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'mobile' => $request->input('mobile'),
                    'email' => $request->input('email'),
                    'updated_by' => auth()->user()->id,
                ];
            }
            $updateEmployee = $data->update($input);

            return redirect()->back();
        }

        if($request->has('family')) {
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

            $families = EmployeeFamily::create($input);

            return redirect()->back();
        }

        if($request->has('education')) {
            $this->validate($request, [
                'institution_name' => 'required',
            ]);
            $input = [
                'employee_id' => $request->input('employee_id'), 
                'institution_name' => $request->input('institution_name'),
                'grade' => $request->input('grade'),
                'major' => $request->input('major'),
                'gpa' => $request->input('gpa'),
            ];

            $families = EmployeeEducation::create($input);

            return redirect()->back();
        }

        if($request->has('training')) {
            $this->validate($request, [
                'training_provider' => 'required',
                'training_title' => 'required',
                'from' => 'required|date',
                'to' => 'date|after:from',
            ]);
            
            $input = [
                'employee_id' => $request->input('employee_id'), 
                'training_provider' => $request->input('training_provider'),
                'training_title' => $request->input('training_title'),
                'location' => $request->input('location'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'status' => $request->input('status'),
            ];
            
            $data = EmployeeTraining::create($input);

            return redirect()->back();    
        }

        if($request->has('service')) {

        }
        
    }

    public function employeeDelete($id)
    {
        $data = Employee::find($id);
        $user = User::where('email',$data->email)->delete();
        $data->delete();
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

