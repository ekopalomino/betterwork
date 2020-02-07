<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeAttendance;
use iteos\Models\AttendanceTransaction;
use iteos\Models\EmployeeLeave;
use iteos\Models\LeaveTransaction;
use iteos\Models\LeaveType;
use iteos\Models\EmployeeReimbursment;
use iteos\Models\EmployeeService;
use iteos\Models\EmployeeTraining;
use iteos\Models\ReimbursType;
use iteos\Models\EmployeeGrievance;
use iteos\Models\GrievanceComment;
use iteos\Models\GrievanceCategory;
use iteos\Models\EmployeeAppraisal;
use iteos\Models\AppraisalData;
use iteos\Models\AppraisalTarget;
use iteos\Models\AppraisalComment;
use iteos\Models\AppraisalAdditionalRole;
use iteos\Models\Bulletin;
use iteos\Models\KnowledgeBase;
use Auth;
use Carbon\Carbon;

class UserMenuController extends Controller
{
    public function index()
    {
        $getEmployees = Employee::join('employee_services','employee_services.employee_id','employees.id')
                                ->where('employees.email',Auth()->user()->email)
                                ->get();
        $getStartDate = EmployeeService::where('employee_id',Auth()->user()->employee_id)
                                        ->orderBy('from','ASC')
                                        ->first();
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();
    	$getAttendance = EmployeeAttendance::where('employee_id',$getEmployee->id)->orderBy('updated_at','DESC')->first();
        
        $tDate = Carbon::now();
        $interval = $tDate->diff($getStartDate->from);
        $totalDays = $interval->format('%a');

        $getRemaining = EmployeeLeave::where('employee_id',$getEmployee->id)->first();
        $getServices = EmployeeService::where('employee_id',$getEmployee->id)->orderBy('from','ASC')->first();
        $getSubordinate = EmployeeService::with('Parent')->where('report_to',$getEmployee->id)->get();
        $getBulletin = Bulletin::orderBy('updated_at','DESC')->get();
        $getKnowledge = KnowledgeBase::orderBy('updated_at','DESC')->get();
        
    	return view('apps.pages.userHome',compact('getEmployee','getAttendance','totalDays','getRemaining','getServices','getSubordinate','getBulletin','getKnowledge'));
    }

    public function clockIn(Request $request)
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();

    	$clockIn = EmployeeAttendance::create([
    		'employee_id' => $getEmployee->id,
    		'status_id' => 'f4f23f41-0588-4111-a881-a043cf355831',
    	]);

        $attendanceIn = AttendanceTransaction::create([
            'attendance_id' => $clockIn->id,
            'clock_in' => Carbon::now(),
        ]);

    	return redirect()->back();
    }

    public function clockOut(Request $request)
    {
        $getEmployee = Employee::where('email',Auth()->user()->email)->first();
        $getData = EmployeeAttendance::where('employee_id',$getEmployee->id)->orderBy('updated_at','DESC')->first();
        $getTime = Carbon::now();
        $clockOut = $getData->update([
            'working_hour' => $getTime->diffInHours($getData->clock_in),
            'status_id' => '2dc764a0-f110-4985-922d-0ffb81363899',
        ]);
        $attendanceOut = AttendanceTransaction::where('attendance_id',$getData->id)->update([
            'clock_out' => $getTime,
            'notes' => $request->input('notes'),
        ]);

    	return redirect()->back();
    }

    public function leaveIndex()
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();
    	$data = EmployeeLeave::where('employee_id',$getEmployee->id)->orderBy('created_at','DESC')->first();
        $types = LeaveType::pluck('leave_name','id')->toArray();
        $details = LeaveTransaction::where('leave_id',$data->id)->orderBy('created_at','DESC')->get();
        
    	return view('apps.pages.myLeave',compact('getEmployee','details','types'));
    }

    public function leaveRequest(Request $request)
    {
    	$this->validate($request, [
            'request_type' => 'required',
            'request_period' => 'required',
            'notes' => 'required',
        ]);
    	$dates = explode('-',$request->input('request_period'));
        $amount = date_diff(date_create($dates[0]),date_create($dates[1]));
        $diff = $amount->format('%d.%h');
        
        $data = EmployeeLeave::where('employee_id',Auth()->user()->employee_id)->where('period',Carbon::now()->year)->first();
        $details = LeaveTransaction::create([
            'leave_id' => $data->id,
            'leave_type' => $request->input('request_type'),
            'leave_start' => Carbon::parse($dates[0]),
            'leave_end' => Carbon::parse($dates[1]),
            'notes' => $request->input('notes'),
            'amount_requested' => $diff,
            'status_id' => 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be',
        ]);
    	
    	return redirect()->route('myLeave.index');
    }

    public function reimbursIndex()
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();
    	$data = EmployeeReimbursment::orderBy('created_at','DESC')->get();
    	$types = ReimbursType::pluck('reimburs_name','id')->toArray();

    	return view('apps.pages.myReimburs',compact('getEmployee','data','types'));
    }

    public function reimbursStore(Request $request)
    {
    	$this->validate($request, [
            'request_type' => 'required',
            'amount' => 'required',
            'notes' => 'required',
        ]);

    	if($request->hasFile('receipt')) {
    		$file = $request->file('receipt')->store('employees_reimburs');

            $data = EmployeeReimbursment::create([
	        	'employee_id' => $request->input('employee_id'),
	        	'transaction_date' => $request->input('transaction_date'),
	        	'type_id' => $request->input('request_type'),
	        	'amount' => $request->input('amount'),
	        	'notes' => $request->input('notes'),
	        	'files' => $file,
	        	'status_id' => 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be',
	        ]);

	        return redirect()->route('myReimburs.index');
    	} else {
    		$data = EmployeeReimbursment::create([
	        	'employee_id' => $request->input('employee_id'),
	        	'transaction_date' => $request->input('transaction_date'),
	        	'type_id' => $request->input('request_type'),
	        	'amount' => $request->input('amount'),
	        	'notes' => $request->input('notes'),
	        	'status_id' => 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be',
	        ]);

	        return redirect()->route('myReimburs.index');
    	}  
    }

    public function grievanceIndex()
    {
        $getEmployee = Employee::where('email',Auth()->user()->email)->first();
        $data = EmployeeGrievance::where('employee_id',$getEmployee->id)
                                    ->orderBy('created_at','DESC')->get();
    	
    	return view('apps.pages.myGrievance',compact('data'));
    }

    public function grievanceCreate()
    {
    	$getEmployee = Employee::where('email',Auth()->user()->email)->first();
    	$types = GrievanceCategory::pluck('category_name','id')->toArray();

    	return view('apps.input.myGrievance',compact('getEmployee','types'));
    }

    public function grievanceStore(Request $request)
    {
    	$this->validate($request, [
            'subject' => 'required',
            'type_id' => 'required',
            'description' => 'required',
        ]);

        $content = $request->input('description');
        $dom = new\DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $isi = $img->getAttribute('src');
            list($type, $data) = explode(';', $isi);
            list(, $isi) = explode(',', $isi);
            $isi = base64_decode($isi);
            $image_name = "/grievance_image/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $isi);
            $access = "http://betterwork.local/public".$image_name;
            $img->removeAttribute('src');
            $img->setAttribute('src', $access);
        }
        $content = $dom->saveHtml();

        if($request->input('is_public') == 'on') {
        	$data = EmployeeGrievance::create([
	        	'employee_id' => $request->input('employee_id'),
	        	'subject' => $request->input('subject'),
	        	'type_id' => $request->input('type_id'),
	        	'is_public' => '1',
	        	'description' => $content,
	        	'status_id' => '1f2967a5-9a88-4d44-a66b-5339c771aca0',
	        ]);
        } else {
        	$data = EmployeeGrievance::create([
	        	'employee_id' => $request->input('employee_id'),
	        	'subject' => $request->input('subject'),
	        	'type_id' => $request->input('type_id'),
	        	'description' => $content,
	        	'status_id' => '1f2967a5-9a88-4d44-a66b-5339c771aca0',
	        ]);
        }

        return redirect()->route('myGrievance.index'); 
    }

    public function grievanceShow($id)
    {
    	$data = EmployeeGrievance::find($id);

    	return view('apps.show.myGrievance',compact('data'));
    }

    public function grievanceEdit($id)
    {

    }

    public function grievanceUpdate(Request $request,$id)
    {

    }

    public function grievanceComment(Request $request,$id)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $content = $request->input('comment');
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

                $path = '/grievance_image/' . uniqid('', true) . '.' . $mimeType;

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

        $data = EmployeeGrievance::find($id);
        if(($data->status_id) == '16f30bee-5db5-472d-b297-926f5c8e4d21') {
            $data->update([
                'status_id' => 'fe6f8153-a433-4a4d-a23d-201811778733',
            ]);
            $comments = GrievanceComment::create([
                'grievance_id' => $id,
                'comment' => $content,
                'comment_by' => $data->employee_id,
            ]);
        } else {
            $comments = GrievanceComment::create([
                'grievance_id' => $id,
                'comment' => $content,
                'comment_by' => $data->employee_id,
            ]);
        }
        

        return redirect()->back();
    }

    public function grievanceRate(Request $request,$id)
    {
        $data = EmployeeGrievance::find($id);
        $data->update([
            'status_id' => '6a787298-14f6-4d19-a7ee-99a3c8ed6466',
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('myGrievance.index');
    }

    public function appraisalIndex()
    {
        $data = EmployeeAppraisal::where('employee_id',Auth()->user()->employee_id)->orderBy('created_at','DESC')->get();

        return view('apps.pages.myAppraisal',compact('data'));
    }

    public function appraisalCreate()
    {
        return view('apps.input.myAppraisal');
    }

    public function appraisalStore(Request $request)
    {
        $getSupervisor = EmployeeService::where('employee_id',Auth()->user()->employee_id)->where('is_active','1')->first();
        $input = ([
            'employee_id' => Auth()->user()->employee_id,
            'supervisor_id' => $getSupervisor->report_to,
            'appraisal_type' => $request->input('appraisal_type'),
            'appraisal_period' => $request->input('period'),
            'status_id' => '1f2967a5-9a88-4d44-a66b-5339c771aca0',
        ]);
        $data = EmployeeAppraisal::create($input);
        $items = $request->kpi;
        foreach($items as $index=>$item)
        {
            $details = AppraisalData::create([
                'appraisal_id' => $data->id,
                'indicator' => $item,
            ]);
        }

        return redirect()->route('myAppraisal.detail',$data->id); 
    }

    public function appraisalDetail($id)
    {
        $data = EmployeeAppraisal::with('Details.Target')->find($id);
        
        return view('apps.input.myAppraisalDetail',compact('data'));
    }

    public function appraisalComment($id)
    {
        $data = AppraisalData::with('Appraisal')->find($id);

        return view('apps.input.myAppComment',compact('data'))->renderSections()['content'];
    }

    public function commentStore(Request $request)
    {
        $data = AppraisalComment::create([
            'appraisal_id' => $request->input('appraisal_id'),
            'data_id' => $request->input('data_id'),
            'comment_by' => Auth()->user()->employee_id,
            'comments' => $request->input('comments'),
        ]);

        return redirect()->back();
    }

    public function targetCreate($id)
    {
        $data = AppraisalData::with('Appraisal')->find($id);

        return view('apps.input.myTarget',compact('data'))->renderSections()['content'];
    }

    public function targetStore(Request $request)
    {
        $target = AppraisalTarget::create([
            'data_id' => $request->input('data_id'),
            'appraisal_id' => $request->input('appraisal_id'),
            'target' => $request->input('target'),
            'job_weight' => $request->input('weight'), 
        ]);

        return redirect()->back();
    }

    public function developmentCreate($id)
    {
        $data = EmployeeAppraisal::find($id);
        
        return view('apps.input.myDevelopment',compact('data'));
    }

    public function developmentStore(Request $request)
    {
        $courses = $request->course;
        $outcomes = $request->outcome;
        $appraisals = $request->appraisal_id;
        foreach($courses as $index=>$course) {
            $training = EmployeeTraining::create([
                'employee_id' => Auth()->user()->employee_id,
                'training_title' => $course,
                'appraisal_id' => $appraisals[$index],
                'training_outcome' => $outcomes[$index],
                'status' => 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be',
            ]);
        }

        return redirect()->route('myAppraisal.index');
    }

    public function appraisalShow($id)
    {
        $data = EmployeeAppraisal::with('Details.Target')->find($id);

        return view('apps.show.myAppraisal',compact('data'));
    }

    public function appraisalEdit($id)
    {
        $data = EmployeeAppraisal::with('Details.Target')->find($id);

        return view('apps.edit.myAppraisal',compact('data'));
    }

    public function targetEdit($id)
    {
        $data = AppraisalTarget::with('Data.Appraisal')->find($id);
        
        return view('apps.edit.myTarget',compact('data'))->renderSections()['content'];
    }

    public function appraisalUpdate(Request $request,$id)
    {
        $data = AppraisalTarget::with('Data.Appraisal')->find($id);
        $sum = AppraisalTarget::where('appraisal_id',$data->appraisal_id)->sum('job_weight');
        
        $weight = ($request->input('weight_real'))/100;
        $progress = ($data->job_weight) * ($weight);
        $input = ([
            'total' => $sum,
            'progress_single' => $progress,
            'progress_total' => $sum - $progress,
            'percent_total' => round(($progress)/$sum,2),
        ]);
        dd($input);
        $data->update([
            'target_real' => $request->input('target_real'),
            'weight_real' => $request->input('weight_real'),
        ]);
        $source = EmployeeAppraisal::where('id',$data->appraisal_id)->where('status_id','c0c2bde9-b149-489c-9e0d-a10e4d2fd661')->first();
        $source->update([
            'progress' => round(($progress)/$sum,2),
        ]);
        
        return redirect()->back();
    }

    public function trainingIndex()
    {
        $data = EmployeeTraining::where('employee_id',Auth()->user()->employee_id)->get();

        return view('apps.pages.myTraining',compact('data'));
    }

    public function trainingEdit($id)
    {
        $data = EmployeeTraining::find($id);

        return view('apps.edit.myTraining',compact('data'))->renderSections()['content'];
    }

    public function trainingUpdate(Request $request,$id)
    {
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
            'certification' => $certificate,
            'reports' => $reports,
            'materials' => $materials,
        ]);

        return redirect()->route('myTraining.index');
    }
}
