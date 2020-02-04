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
use iteos\Models\EmployeeSalary;
use iteos\Models\Salary;
use Hash;
use Auth;
use DB;
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
                'tax_category' => 'required',
                'tax_no' => 'required',
                'address' => 'required',
                'mobile' => 'required|numeric',
                'email' => 'required|email:rfc,dns|unique:employees,email',
                'contract_status' => 'required',
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
                'contract_status' => $request->input('contract_status'), 
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'address' => $request->input('address'),
                'sex' => $request->input('sex'),
                'marital_status' => $request->input('marital_status'),
                'place_of_birth' => $request->input('place_of_birth'),
                'date_of_birth' => $request->input('date_of_birth'),
                'id_card' => $request->input('id_card'),
                'tax_category' => $request->input('tax_category'),
                'tax_no' => $request->input('tax_no'),
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
                'employee_id' => $result->id,
                'name' => $name,
                'email' => $request->input('email'),
                'password' => $encryptPass,
                'avatar' => $result->picture,
            ]);

            return redirect()->route('employee.index');
        
    }

    public function employeeEdit($id)
    {
        $data = Employee::find($id);
        $grades = EmployeePosition::pluck('position_name','position_name')->toArray();
        $employees = Employee::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->pluck('name','id')->toArray();
        $degrees  = DB::table('education_degree')->pluck('degree_name','degree_name')->toArray();

        $cities = Location::pluck('city','city')->toArray();
        
        return view('apps.edit.employee',compact('grades','cities','data','employees','degrees'));
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
                $filename=$file_name.'.'.$extension;
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
                    'tax_category' => $request->input('tax_category'),
                    'tax_no' => $request->input('tax_no'),
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
                    'tax_category' => $request->input('tax_category'),
                    'tax_no' => $request->input('tax_no'),
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
                'degree' => 'required',
                'major' => 'required',
                'gpa' => 'required',
            ]);
            $input = [
                'employee_id' => $request->input('employee_id'), 
                'institution_name' => $request->input('institution_name'),
                'grade' => $request->input('degree'),
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
                'training_start' => 'required|date'
            ]);
            
            $input = [
                'employee_id' => $request->input('employee_id'), 
                'training_provider' => $request->input('training_provider'),
                'training_title' => $request->input('training_title'),
                'location' => $request->input('location'),
                'from' => $request->input('training_start'),
                'to' => $request->input('training_end'),
                'status' => $request->input('status'),
            ];
            
            $data = EmployeeTraining::create($input);

            return redirect()->back();    
        }

        if($request->has('service')) {
            $this->validate($request, [
                'position' => 'required',
                'report_to' => 'required',
                'from' => 'required|date',
                'job_title' => 'required',
                'salary' => 'required',
            ]);
            
            if($request->hasFile('contract')) {
                $uploadedFile = $request->file('contract');
                $path = $uploadedFile->store('employee_contract');
                if(($request->input('to')) === null) {
                    $input = [
                        'employee_id' => $request->input('employee_id'), 
                        'position' => $request->input('position'),
                        'report_to' => $request->input('report_to'),
                        'grade' => $request->input('job_title'),
                        'from' => $request->input('from'),
                        'salary' => $request->input('salary'),
                        'is_active' => '1',
                        'contract' => $path,
                    ];
                    $data = EmployeeService::create($input);
                } else {
                    $input = [
                        'employee_id' => $request->input('employee_id'), 
                        'position' => $request->input('position'),
                        'report_to' => $request->input('report_to'),
                        'grade' => $request->input('job_title'),
                        'from' => $request->input('from'),
                        'to' => $request->input('to'),
                        'salary' => $request->input('salary'),
                        'is_active' => '0',
                        'contract' => $path,
                    ];
                    
                    $data = EmployeeService::create($input); 
                }
            } else {
                if(($request->input('to')) === null) {
                    $input = [
                        'employee_id' => $request->input('employee_id'), 
                        'position' => $request->input('position'),
                        'report_to' => $request->input('report_to'),
                        'grade' => $request->input('job_title'),
                        'from' => $request->input('from'),
                        'salary' => $request->input('salary'),
                        'is_active' => '1',
                    ];
                    
                    $data = EmployeeService::create($input);
                } else {
                    $input = [
                        'employee_id' => $request->input('employee_id'), 
                        'position' => $request->input('position'),
                        'report_to' => $request->input('report_to'),
                        'grade' => $request->input('job_title'),
                        'from' => $request->input('from'),
                        'to' => $request->input('to'),
                        'salary' => $request->input('salary'),
                        'is_active' => '0',
                    ];
                    
                    $data = EmployeeService::create($input);
                }
            }
            
            return redirect()->back(); 
        }
        
    }

    public function familyEdit($id) 
    {
        $data = EmployeeFamily::find($id);

        return view('apps.edit.employeeFamily',compact('data'))->renderSections()['content'];
    }

    public function familyUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'relations' => 'required',
            'mobile' => 'required',
        ]);

        $data = EmployeeFamily::find($id);
        $data->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'relations' => $request->input('relations'),
            'phone' => $request->input('phone'),
            'mobile' => $request->input('mobile'),
        ]);

        return redirect()->back();
    }

    public function educationEdit($id) 
    {
        $data = EmployeeEducation::find($id);
        $degrees  = DB::table('education_degree')->pluck('degree_name','degree_name')->toArray();

        return view('apps.edit.employeeEducation',compact('data','degrees'))->renderSections()['content'];
    }

    public function educationUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'institution_name' => 'required',
            'degree' => 'required',
            'major' => 'required',
            'gpa' => 'required',
        ]);

        $data = EmployeeEducation::find($id);
        $data->update([
            'institution_name' => $request->input('institution_name'),
            'grade' => $request->input('degree'),
            'major' => $request->input('major'),
            'gpa' => $request->input('gpa'),
        ]);

        return redirect()->back();
    }

    public function trainingEdit($id) 
    {
        $data = EmployeeTraining::find($id);
        
        return view('apps.edit.employeeTraining',compact('data'))->renderSections()['content'];
    }

    public function trainingUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'training_provider' => 'required',
            'training_title' => 'required',
            'training_start' => 'required|date',
            'status' => 'required',
        ]);

        $data = EmployeeTraining::find($id);

        $certificate = '' ;
        $reports = '' ;
        $materials = '' ;

        if($request->hasFile('certificate')) {
            $uploadedFile = $request->file('certificate');
            $certificate = $uploadedFile->store('employee_training');
        }
        

        if($request->hasFile('reports')) {
            $uploadedFile = $request->file('reports');
            $reports = $uploadedFile->store('employee_training');
        }
        
        
        if($request->hasFile('materials')) {
            $uploadedFile = $request->file('materials');
            $materials = $uploadedFile->store('employee_training');
        }
        
        
        $data->update([
            'training_provider' => $request->input('training_provider'),
            'training_title' => $request->input('training_title'),
            'location' => $request->input('location'),
            'from' => $request->input('training_start'),
            'to' => $request->input('training_end'),
            'status' => $request->input('status'),
            'certification' => $certificate,
            'reports' => $reports,
            'materials' => $materials,
        ]);

        return redirect()->back();
    }

    public function serviceEdit($id) 
    {
        $data = EmployeeService::find($id);
        $grades = EmployeePosition::pluck('position_name','position_name')->toArray();
        $employees = Employee::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->pluck('name','id')->toArray();

        return view('apps.edit.employeeService',compact('data','grades','employees'))->renderSections()['content'];
    }

    public function serviceUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'position' => 'required',
            'report_to' => 'required',
            'from' => 'required|date',
        ]);

        $data = EmployeeService::find($id);
        if($request->hasFile('contract')) {
            $uploadedFile = $request->file('contract');
            $path = $uploadedFile->store('employee_contract');
            if(($request->input('to')) === null) {
                $data->update([
                    'position' => $request->input('position'),
                    'report_to' => $request->input('report_to'),
                    'grade' => $request->input('job_title'),
                    'from' => $request->input('from'),
                    'salary' => $request->input('salary'),
                    'is_active' => '1',
                    'contract' => $path,
                ]);
            } else {
                $data->update([
                    'position' => $request->input('position'),
                    'report_to' => $request->input('report_to'),
                    'grade' => $request->input('job_title'),
                    'from' => $request->input('from'),
                    'to' => $request->input('to'),
                    'salary' => $request->input('salary'),
                    'is_active' => '0',
                    'contract' => $path,
                ]);
                
            }
        } else {
            if(($request->input('to')) === null) {
                $data->update([
                    'position' => $request->input('position'),
                    'report_to' => $request->input('report_to'),
                    'grade' => $request->input('job_title'),
                    'from' => $request->input('from'),
                    'salary' => $request->input('salary'),
                    'is_active' => '1',
                ]);
                
            } else {
                $data->update([
                    'position' => $request->input('position'),
                    'report_to' => $request->input('report_to'),
                    'grade' => $request->input('job_title'),
                    'from' => $request->input('from'),
                    'to' => $request->input('to'),
                    'salary' => $request->input('salary'),
                    'is_active' => '0',
                ]);
                $result = $data->update($input);
            }
        }
        return redirect()->back();
    }

    
    public function employeeDelete($id)
    {
        $data = Employee::find($id);
        $user = User::where('email',$data->email)->delete();
        $data->delete();

        return redirect()->route('employee.index');
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

    public function salaryIndex()
    {
        return view('apps.pages.salaryIndex');
    }

    public function salaryCreate()
    {
        $employees = Employee::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->pluck('name','id')->toArray();

        return view('apps.input.salary',compact('employees'));
    }

    public function salaryProcess(Request $request)
    {
        $input = $request->all();
        
        $getJkk = '0.0024';
        $getJkm = '0.003';
        $jhtC = '0.037';
        $jhtP = '0.02';
        $jpC = '0.02';
        $jpP = '0.01';


        $employees = $request->employee_id;
        $nett_salary = $request->nett_salary;
        
        
    }
}

