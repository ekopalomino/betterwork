<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\Employee;
use iteos\Models\EmployeeAttendance;
use iteos\Models\EmployeeLeave;
use iteos\Models\LeaveType;
use iteos\Models\EmployeeReimbursment;
use iteos\Models\ReimbursType;
use iteos\Models\EmployeeGrievance;
use iteos\Models\GrievanceComment;
use iteos\Models\GrievanceCategory;
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
}
