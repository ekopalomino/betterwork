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
use iteos\Models\EmployeeAttendance;
use iteos\Models\AttendanceTransaction;
use iteos\Models\EmployeeReimbursment;
use iteos\Models\EmployeeLeave;
use iteos\Models\LeaveTransaction;
use iteos\Models\Location;
use iteos\Models\EmployeeSalary;
use iteos\Models\Salary;
use iteos\Models\Bulletin;
use iteos\Models\KnowledgeBase;
use iteos\Models\DocumentCategory;
use iteos\Models\EmployeeAppraisal;
use iteos\Models\AppraisalData;
use iteos\Models\AppraisalTarget;
use iteos\Models\AppraisalSoftGoal;
use iteos\Models\AppraisalComment;
use iteos\Models\AppraisalAdditionalRole;
use Hash;
use Auth;
use DB;
use Carbon\Carbon;
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

            $leaves = EmployeeLeave::create([
                'employee_id' => $result->id,
                'period' => Carbon::now()->year,
                'leave_amount' => '12',
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
                    'leave_amount' => $request->input('leave_amount'),
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
                    'leave_amount' => $request->input('leave_amount'),
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
        $data = EmployeeAttendance::orderBy('updated_at','DESC')->get();

    	return view('apps.pages.attendanceIndex',compact('data'));
    }

    public function attendanceSearch(Request $request)
    {
        $empID = $request->input('employee_id');
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $dates = $request->input('date_range');
        $dateRange = explode('-',$dates);
        $startDate = Carbon::parse($dateRange[0]);
        $endDate = Carbon::parse($dateRange[1]);

        $data = EmployeeAttendance::join('employees','employees.id','employee_attendances.employee_id')
                                    ->where('employees.employee_no',$empID)
                                    ->orWhere('employees.first_name',$firstName)
                                    ->orWhere('employees.last_name',$lastName)
                                    ->orWhere('employee_attendances.created_at','>=',$startDate)
                                    ->where('employee_attendances.created_at','<=',$endDate)
                                    ->get();
        return view('apps.pages.attendanceIndex',compact('data'));
    }

    public function requestIndex()
    {
        $data = LeaveTransaction::with('parent')->orderBy('created_at','DESC')->get();

    	return view('apps.pages.requestIndex',compact('data'));
    }

    public function requestShow($id)
    {
        $data = LeaveTransaction::with('parent')->find($id);
        $getLeaveAmount = Employee::where('id',$data->Parent->employee_id)->first();
        $getLeaveParent = EmployeeLeave::where('employee_id',$getLeaveAmount->id)->where('period',Carbon::now()->year)->first();
        $usage = LeaveTransaction::where('leave_id',$getLeaveParent->id)->where('status_id','!=','6840ffe5-600b-4109-8abf-819bf77b24cf')->orderBy('updated_at','DESC')->first();
        
        if(empty($getLeaveParent->leave_remaining)) {
            $remaining = $getLeaveParent->leave_amount;
        } else {
            $remaining = $getLeaveParent->leave_remaining;
        }
        
        return view('apps.show.employeeRequest',compact('data','remaining'))->renderSections()['content'];
    }

    public function requestUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'status_id' => 'required',
        ]);
        
        $details = LeaveTransaction::with('parent')->find($id);
        $data = EmployeeLeave::where('id',$details->leave_id)->where('period',Carbon::now()->year)->first();

        $record = $details->update([
            'status_id' => $request->input('status_id'),
        ]);
        if(($details->status_id) == 'ca52a2ce-5c37-48ce-a7f2-0fd5311860c2') {
           if(empty($data->leave_remaining)) {
                $changes = $data->update([
                    'leave_usage' => $details->amount_requested,
                    'leave_remaining' => ($data->leave_amount) - ($details->amount_requested),
                ]);
            } else {
                $changes = $data->update([
                    'leave_usage' => ($data->leave_usage) + ($details->amount_requested),
                    'leave_remaining' => ($data->leave_remaining) - ($details->amount_requested),
                ]);
            } 
        }
        

        return redirect()->route('request.index');
    }

    public function employeeLeave()
    {
        $current = Carbon::now()->year;
        $data = Employee::orderBy('employee_no','ASC')->get();
        $leaves = EmployeeLeave::where('status_id','ca52a2ce-5c37-48ce-a7f2-0fd5311860c2')->whereYEAR('created_at',$current)->get();
        foreach($data as $index=>$value) {
            $getLeaveAmount = $value->leave_amount;
            $usage = EmployeeLeave::where('employee_id',$value->id)->where('status_id','ca52a2ce-5c37-48ce-a7f2-0fd5311860c2')->count();
            $remaining = ($getLeaveAmount) - ($usage);
        }
        return view('apps.pages.leaveIndex',compact('data','remaining'));
    }

    public function appraisalIndex()
    {
        $data = EmployeeAppraisal::orderBy('created_at','DESC')->get();

        return view('apps.pages.appraisalIndex',compact('data'));
    }

    public function appraisalShow($id)
    {
        $data = EmployeeAppraisal::with('Details.Target')->find($id);

        return view('apps.show.employeeAppraisal',compact('data'));
    }

    public function appraisalProcess($id)
    {
        $data = EmployeeAppraisal::with('Details.Target')->find($id);

        return view('apps.show.employeeAppraisal',compact('data'));
    }

    public function targetEdit($id)
    {
        $data = EmployeeAppraisal::with('Details.Target')->find($id);
        
        return view('apps.input.employeeAppraisal',compact('data'));
    }

    public function targetChange($id)
    {
        $data = AppraisalTarget::with('Data.Appraisal')->find($id);
        
        return view('apps.edit.employeeTarget',compact('data'))->renderSections()['content'];
    }

    public function targetUpdate(Request $request,$id)
    {
        $data = AppraisalTarget::with('Data.Appraisal')->find($id);
        $data->update([
            'target' => $request->input('target'),
            'job_weight' => $request->input('job_weight'),
        ]);

        return redirect()->back();
    }

    public function targetDestroy($id)
    {
        $data = AppraisalTarget::with('Data.Appraisal')->find($id);
        $data->delete();

        return redirect()->back();
    }

    public function softGoalCreate($id)
    {
        $data = AppraisalTarget::with('Data.Appraisal')->find($id);

        return view('apps.input.employeeSoftGoal',compact('data'))->renderSections()['content'];
    }

    public function softGoalStore(Request $request)
    {
        $data = AppraisalSoftGoal::create([
            'appraisal_id' => $request->input('appraisal_id'),
            'competency' => $request->input('competency'),
            'notes' => $request->input('notes'),
        ]);

        return redirect()->back();
    }

    public function softGoalEdit($id)
    {
        $data = AppraisalSoftGoal::find($id);

        return view('apps.edit.employeeSoftGoal',compact('data'))->renderSections()['content'];
    }

    public function softGoalUpdate(Request $request,$id)
    {
        $data = AppraisalSoftGoal::find($id);
        $data->update([
            'competency' => $request->input('competency'),
            'notes' => $request->input('notes'),
        ]);

        return redirect()->back();
    }

    public function softGoalDelete($id)
    {
        $data = AppraisalSoftGoal::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function additionalRoleCreate($id)
    {
        $data = AppraisalTarget::with('Data.Appraisal')->find($id);

        return view('apps.input.employeeAdditionalRole',compact('data'))->renderSections()['content'];
    }

    public function additionalRoleStore(Request $request)
    {
        $data = AppraisalAdditionalRole::create([
            'appraisal_id' => $request->input('appraisal_id'),
            'task' => $request->input('task'),
            'details' => $request->input('details'),
        ]);

        return redirect()->back();
    }

    public function additionalRoleEdit($id)
    {
        $data = AppraisalAdditionalRole::find($id);

        return view('apps.edit.employeeAdditionalRole',compact('data'))->renderSections()['content'];
    }

    public function additionalRoleUpdate(Request $request,$id)
    {
        $data = AppraisalAdditionalRole::find($id);
        $data->update([
            'task' => $request->input('task'),
            'details' => $request->input('details'),
        ]);

        return redirect()->back();
    }

    public function additionalRoleDelete($id)
    {
        $data = AppraisalAdditionalRole::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function bulletinIndex()
    {
        $data = Bulletin::orderBy('updated_at','DESC')->get();

        return view('apps.pages.bulletinIndex',compact('data'));
    }

    public function bulletinCreate()
    {
        return view('apps.input.bulletin');
    }

    public function bulletinStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $content = $request->input('content');
        $dom = new\DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $isi = $img->getAttribute('src');
            list($type, $data) = explode(';', $isi);
            list(, $isi) = explode(',', $isi);
            $isi = base64_decode($isi);
            $image_name = "/bulletin/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $isi);
            $access = "http://betterwork.local/public".$image_name;
            $img->removeAttribute('src');
            $img->setAttribute('src', $access);
        }
        $content = $dom->saveHtml();

        $data = Bulletin::create([
            'title' => $request->input('title'),
            'content' => $content,
            'created_by' => Auth()->user()->id,
        ]);
        
        return redirect()->route('bulletin.index');
    }

    public function bulletinShow($id)
    {
        $data = Bulletin::find($id);

        return view('apps.show.bulletin');
    }

    public function bulletinEdit($id)
    {
        $data = Bulletin::find($id);

        return view('apps.edit.bulletin',compact('data'));
    }

    public function bulletinUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $content = $request->input('content');
         libxml_use_internal_errors(true);
        $dom = new\DomDocument();   
        $dom->loadHTML(
            mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];

                $path = '/bulletin/' . uniqid('', true) . '.' . $mimeType;

                Image::make($src)
                    ->resize(750, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode($mimeType, 80)
                    ->save(public_path($path));

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($path));
            }
        }
        $content = $dom->saveHTML();

        $data = Bulletin::find($id);
        $data->update([
            'title' => $request->input('title'),
            'content' => $content,
        ]);

        return redirect()->route('bulletin.index');
    }

    public function bulletinDelete($id)
    {
        $data = Bulletin::find($id);
        $data->delete();

        return redirect()->route('bulletin.index');
    }

    public function knowledgeIndex()
    {
        $data = KnowledgeBase::orderBy('updated_at','DESC')->get();

        return view('apps.pages.knowledgeIndex',compact('data'));
    }

    public function knowledgeCreate()
    {
        return view('apps.input.knowledge');
    }

    public function knowledgeStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'file' => 'file',
        ]);

        $content = $request->input('content');
        $dom = new\DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $isi = $img->getAttribute('src');
            list($type, $data) = explode(';', $isi);
            list(, $isi) = explode(',', $isi);
            $isi = base64_decode($isi);
            $image_name = "/bulletin/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $isi);
            $access = "http://betterwork.local/public".$image_name;
            $img->removeAttribute('src');
            $img->setAttribute('src', $access);
        }
        $content = $dom->saveHtml();

        if($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $path = $uploadedFile->store('knowledgebase');

            $data = KnowledgeBase::create([
                'title' => $request->input('title'),
                'content' => $content,
                'file' => $path,
                'created_by' => Auth()->user()->id,
            ]);
        } else {
            $data = KnowledgeBase::create([
                'title' => $request->input('title'),
                'content' => $content,
                'created_by' => Auth()->user()->id,
            ]);
        }
        
        return redirect()->route('knowledge.index');
    }

    public function knowledgeShow($id)
    {
        $data = KnowledgeBase::find($id);

        return view('apps.show.knowledge',compact('data'));
    }

    public function knowledgeEdit($id)
    {
        $data = KnowledgeBase::find($id);

        return view('apps.edit.knowledge',compact('data'));
    }

    public function knowledgeUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'file' => 'file',
        ]);

        $content = $request->input('content');
         libxml_use_internal_errors(true);
        $dom = new\DomDocument();   
        $dom->loadHTML(
            mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];

                $path = '/bulletin/' . uniqid('', true) . '.' . $mimeType;

                Image::make($src)
                    ->resize(750, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode($mimeType, 80)
                    ->save(public_path($path));

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($path));
            }
        }
        $content = $dom->saveHTML();

        if($request->hasFile('file')) {
            $data = KnowledgeBase::find($id);
            $uploadedFile = $request->file('file');
            $path = $uploadedFile->store('knowledgebase');
            $data->update([
                'title' => $request->input('title'),
                'content' => $content,
                'file' => $path,
            ]);
        } else {
            $data = KnowledgeBase::find($id);
            $data->update([
                'title' => $request->input('title'),
                'content' => $content,
            ]);
        }
        
        return redirect()->route('knowledge.index');
    }

    public function knowledgeDelete($id)
    {
        $data = KnowledgeBase::find($id);
        $data->delete();

        return redirect()->route('knowledge.index');
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
        
    }
}

