<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\User;
use iteos\Models\EmployeePosition;
use iteos\Models\LeaveType;
use iteos\Models\ReimbursType;
use iteos\Models\DocumentCategory;
use iteos\Models\GrievanceCategory;
use iteos\Models\ChartOfAccount;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
use DB;
use Auth;

class ConfigurationController extends Controller
{
    public function index()
    {
    	return view('apps.pages.configurationPage');
    }

    public function applicationIndex()
    {
    	return view('apps.pages.applicationSetting');
    }

    public function positionIndex()
    {
        $data = EmployeePosition::orderBy('id','ASC')->get();

    	return view('apps.pages.employeePosition',compact('data'));
    }

    public function positionStore(Request $request)
    {
        $this->validate($request, [
            'position_name' => 'required',
        ]);

        $data = EmployeePosition::create([
            'position_name' => $request->input('position_name'),
            'created_by' => auth()->user()->id,
        ]);

        $log = 'Position '.($data->position_name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Position '.($data->position_name).' Created',
            'alert-type' => 'success'
        );

        return redirect()->route('position.index')->with($notification);
    }

    public function positionEdit($id)
    {
        $data = EmployeePosition::find($id);

        return view('apps.edit.employeePosition',compact('data'))->renderSections()['content'];
    }

    public function positionUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'position_name' => 'required',
        ]);
        $orig = EmployeePosition::find($id);
        $data = $orig->update([
            'position_name' => $request->input('position_name'),
            'updated_by' => auth()->user()->id,
        ]);

        $log = 'Position '.($orig->position_name).' Updated';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Position '.($orig->position_name).' Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('position.index')->with($notification);
    }

    public function positionDestroy($id)
    {
        $data = EmployeePosition::find($id);
        $log = 'Position '.($data->position_name).' Deleted';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Position '.($data->position_name).' Deleted',
            'alert-type' => 'success'
        );
        $data->delete();

        return redirect()->route('position.index')->with($notification);
    }

    public function leaveTypeIndex()
    {
        $data = LeaveType::orderBy('id','ASC')->get();

    	return view('apps.pages.leaveType',compact('data'));
    }

    public function leaveTypeStore(Request $request)
    {
        $this->validate($request, [
            'leave_name' => 'required',
        ]);

        $data = LeaveType::create([
            'leave_name' => $request->input('leave_name'),
            'created_by' => auth()->user()->id,
        ]);

        $log = 'Type '.($data->leave_name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Type '.($data->leave_name).' Created',
            'alert-type' => 'success'
        );

        return redirect()->route('leaveType.index')->with($notification);
    }

    public function leaveTypeEdit($id)
    {
        $data = LeaveType::find($id);

        return view('apps.edit.leaveType',compact('data'))->renderSections()['content'];
    }

    public function leaveTypeUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'leave_name' => 'required',
        ]);
        $orig = LeaveType::find($id);
        $data = $orig->update([
            'leave_name' => $request->input('leave_name'),
            'updated_by' => auth()->user()->id,
        ]);

        $log = 'Type '.($orig->leave_name).' Updated';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Type '.($orig->leave_name).' Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('leaveType.index')->with($notification);
    }

    public function leaveTypeDestroy($id)
    {
        $data = LeaveType::find($id);
        $log = 'Type '.($data->leave_name).' Deleted';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Type '.($data->leave_name).' Deleted',
            'alert-type' => 'success'
        );
        $data->delete();

        return redirect()->route('leaveType.index')->with($notification);
    }

    public function reimbursTypeIndex()
    {
        $data = ReimbursType::orderBy('id','ASC')->get();

    	return view('apps.pages.reimbursType',compact('data'));
    }

    public function reimbursTypeStore(Request $request)
    {
        $this->validate($request, [
            'reimburs_name' => 'required',
        ]);

        $data = ReimbursType::create([
            'reimburs_name' => $request->input('reimburs_name'),
            'created_by' => auth()->user()->id,
        ]);

        $log = 'Type '.($data->reimburs_name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Type '.($data->reimburs_name).' Created',
            'alert-type' => 'success'
        );

        return redirect()->route('reimbursType.index')->with($notification);
    }

    public function reimbursTypeEdit($id)
    {
        $data = ReimbursType::find($id);

        return view('apps.edit.reimbursType',compact('data'))->renderSections()['content'];
    }

    public function reimbursTypeUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'reimburs_name' => 'required',
        ]);
        $orig = ReimbursType::find($id);
        $data = $orig->update([
            'reimburs_name' => $request->input('reimburs_name'),
            'updated_by' => auth()->user()->id,
        ]);

        $log = 'Type '.($orig->reimburs_name).' Updated';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Type '.($orig->reimburs_name).' Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('reimbursType.index')->with($notification);
    }

    public function reimbursTypeDestroy($id)
    {
        $data = ReimbursType::find($id);
        $log = 'Type '.($data->reimburs_name).' Deleted';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Type '.($data->reimburs_name).' Deleted',
            'alert-type' => 'success'
        );
        $data->delete();

        return redirect()->route('reimbursType.index')->with($notification);
    }

    public function documentCategoryIndex()
    {
        $data = DocumentCategory::orderBy('id','ASC')->get();

    	return view('apps.pages.documentCategory',compact('data'));
    }

    public function documentCategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $data = DocumentCategory::create([
            'category_name' => $request->input('category_name'),
            'created_by' => auth()->user()->id,
        ]);

        $log = 'Category '.($data->category_name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($data->category_name).' Created',
            'alert-type' => 'success'
        );

        return redirect()->route('docCat.index')->with($notification);
    }

    public function documentCategoryEdit($id)
    {
        $data = DocumentCategory::find($id);

        return view('apps.edit.documentCategory',compact('data'))->renderSections()['content'];
    }

    public function documentCategoryUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        $orig = DocumentCategory::find($id);
        $data = $orig->update([
            'category_name' => $request->input('category_name'),
            'updated_by' => auth()->user()->id,
        ]);

        $log = 'Category '.($orig->category_name).' Updated';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($orig->category_name).' Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('docCat.index')->with($notification);
    }

    public function documentCategoryDestroy($id)
    {
        $data = DocumentCategory::find($id);
        $log = 'Category '.($data->category_name).' Deleted';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($data->category_name).' Deleted',
            'alert-type' => 'success'
        );
        $data->delete();

        return redirect()->route('docCat.index')->with($notification);
    }

    public function grievanceCategoryIndex()
    {
        $data = GrievanceCategory::orderBy('id','ASC')->get();

    	return view('apps.pages.grievanceCategory',compact('data'));
    }

    public function grievanceCategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $data = GrievanceCategory::create([
            'category_name' => $request->input('category_name'),
            'created_by' => auth()->user()->id,
        ]);

        $log = 'Category '.($data->category_name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($data->category_name).' Created',
            'alert-type' => 'success'
        );

        return redirect()->route('grievCat.index')->with($notification);
    }

    public function grievanceCategoryEdit($id)
    {
        $data = GrievanceCategory::find($id);

        return view('apps.edit.grievanceCategory',compact('data'))->renderSections()['content'];
    }

    public function grievanceCategoryUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        $orig = GrievanceCategory::find($id);
        $data = $orig->update([
            'category_name' => $request->input('category_name'),
            'updated_by' => auth()->user()->id,
        ]);

        $log = 'Category '.($orig->category_name).' Updated';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($orig->category_name).' Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('grievCat.index')->with($notification);
    }

    public function grievanceCategoryDestroy($id)
    {
        $data = GrievanceCategory::find($id);
        $log = 'Category '.($data->category_name).' Deleted';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($data->category_name).' Deleted',
            'alert-type' => 'success'
        );
        $data->delete();

        return redirect()->route('grievCat.index')->with($notification);
    }

    public function coaCategoryIndex()
    {
        $data = ChartOfAccount::orderBy('account_id','ASC')->get();
        $parents = ChartOfAccount::pluck('account_name','account_name')->toArray();

    	return view('apps.pages.coaCategory',compact('data','parents'));
    }

    public function coaCategoryStore(Request $request)
    {
        $this->validate($request, [
            'account_id' => 'required',
            'account_name' => 'required',
            'account_category' => 'required',
        ]);

        $data = ChartOfAccount::create([
            'account_id' => $request->input('account_id'),
            'account_name' => $request->input('account_name'),
            'account_category' => $request->input('account_category'),
            'account_parent' => $request->input('account_parent'),
            'created_by' => auth()->user()->id,
        ]);

        $log = 'Category '.($data->account_name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($data->account_name).' Created',
            'alert-type' => 'success'
        );

        return redirect()->route('coaCat.index')->with($notification);
    }

    public function coaCategoryEdit($id)
    {
        $data = ChartOfAccount::find($id);
        $parents = ChartOfAccount::pluck('account_name','account_name')->toArray();

        return view('apps.edit.coaCategory',compact('data','parents'))->renderSections()['content'];
    }

    public function coaCategoryUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        $orig = GrievanceCategory::find($id);
        $data = $orig->update([
            'category_name' => $request->input('category_name'),
            'updated_by' => auth()->user()->id,
        ]);

        $log = 'Category '.($orig->category_name).' Updated';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($orig->category_name).' Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('coaCat.index')->with($notification);
    }

    public function coaCategoryDestroy($id)
    {
        $data = GrievanceCategory::find($id);
        $log = 'Category '.($data->category_name).' Deleted';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Category '.($data->category_name).' Deleted',
            'alert-type' => 'success'
        );
        $data->delete();

        return redirect()->route('coaCat.index')->with($notification);
    }

    public function assetCategoryIndex()
    {
    	return view('apps.pages.assetCategory');
    }

    public function userIndex()
    {
        $data = User::orderBy('id','ASC')->get();
        $roles = Role::pluck('name','name')->all();

        return view('apps.pages.users',compact('data','roles'));
    }

    public function userStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        
        $log = 'User '.($user->name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Created',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        
        return view('apps.edit.users',compact('user','roles','userRole'))->renderSections()['content'];
    }

    public function userUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all(); 
        
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        
        DB::table('model_has_roles')->where('model_id',$id)->delete();        
        $user->assignRole($request->input('roles'));
        
        $log = 'User '.($user->name).' Berhasil diubah';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = Auth::user();
        $user->update($input);

        $log = 'Password User '.($user->name).' Changed';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Password User '.($user->name).' Changed',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function userSuspend($id)
    {
        $input = ['status_id' => 'bca5aaf9-c7ff-4359-9d6c-28768981b416'];
        $user = User::find($id);
        $user->update($input);
        
        $log = 'User '.($user->name).' Suspended';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Suspended',
            'alert-type' => 'success'
        );
        return redirect()->route('user.index')
                        ->with($notification);
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        
        $log = 'User '.($user->name).' Dihapus';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Dihapus',
            'alert-type' => 'success'
        );
        $user->delete();
        return redirect()->route('user.index')
                        ->with($notification);
    }

    public function roleIndex()
    {
        $roles = Role::orderBy('id','ASC')->get();
        return view('apps.pages.roles',compact('roles'));
    }

    public function roleCreate()
    {
        return view('apps.input.roles');
    }

    public function roleStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        $log = 'Access Role '.($role->name).' Created';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Access Role '.($role->name).' Created',
            'alert-type' => 'success'
        ); 

        return redirect()->route('role.index')
                        ->with($notification);
    }

    public function roleEdit($id)
    {
        $data = Role::find($id);
        $permission = Permission::get();
        $roles = Role::join('role_has_permissions','role_has_permissions.role_id','=','roles.id')
                       ->where('roles.id',$id)
                       ->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            /*->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')*/
            ->get();
        
        return view('apps.edit.roles',compact('data','rolePermissions','roles'));
    }

    public function roleUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));
        $log = 'Access Role '.($role->name).' Updated';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Access Role '.($role->name).' Updated',
            'alert-type' => 'success'
        ); 

        return redirect()->route('role.index')
                        ->with($notification);
    }

    public function roleDestroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        $log = 'Access Role '.($role->name).' Deleted';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Access Role '.($role->name).' Deleted',
            'alert-type' => 'success'
        ); 
        return redirect()->route('role.index')
                        ->with($notification);
    }

    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('apps.pages.logActivity',compact('logs'));
    }
}
