<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RollController extends Controller
{
    function index()
    {
       
        return view('roles.index');
    }

    function getData()
    {
        $roles = Role::all();
        return response()->json([
            'status'=>200,
            'roles'=>$roles
        ]);
    }
    function create(Request $request)
    {
        //echo "<pre>"; print_r($_POST);exit;

        $validator = Validator::make(
            $request->all(),
            [
                'rolename'=>'required'
            ],
            [
                'rolename.required'=>'اسم رول ضروری میباشد'
            ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'error'=>$validator->errors()
            ]);
        }
        if(!isset($request->hidden_id))
        {
            $roles = new Role;
            $roles->name = $request->rolename;
            $roles->save();
            return response()->json([
                'status'=>200,
                'message'=>'رول موفقانه ثبت گردید'
            ]);


        }
        else {
            $roles_id = $request->hidden_id;
            $role_name = $request->rolename; 

            $roles = Role::find($roles_id);
            $roles->name = $role_name;
            $roles->update();
           

            return response()->json([
                'status'=>200,
                'message'=>'رول موفقانه اپدیت شد'
            ]);
        }
        
        
        
    }

    function delete($id)
    {
        $roles  = Role::find($id);
        $roles->delete();
        return response()->json([
            'status'=>200,
            'message'=>'رول موفقانه حذف گردید'
        ]);
    }
    
    function update($id)
    {
        $roles = Role::find($id);
        return response()->json([
            'status'=>200,
            'roles'=>$roles
        ]);
    }

    function assignPermission($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('roles.assignPermissionView',compact('permissions','role'));

    }

    function givePermission(Request $request)
    {
        $role_id = $request->role_id;
        // dd($role_id);
        $permission_name = $request->permission_name;
        // dd($permission_name);

        $role = Role::find($role_id);

        if($role->hasPermissionTo($permission_name))
        {
            return response()->json(['message'=>'صلاحیت در رول موجود است']);

        }
        $role->givePermissionTo($permission_name);
        return response()->json(['message'=>'صلاحیت اضافه گردید']); 
        


    }

    function getPermissions($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);


        return view('roles.roleHasPermission',compact('permissions','role'));

    }

    function revokePermission(Request $request)
    {
        $role_id = $request->role_id;
        $permission_id = $request->permission_id;

        // dd($role_id,$permission_id);

        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);
        $role->revokePermissionTo($permission);
        return response()->json(['status'=>200,'message'=>'رکارد موفقانه حذف گردید']);

    }

    
}







// function delete($id)
// {
//     $roles = Role::find($id);
//     $roles->delete();
//     return redirect()->back();
// }

// function update($id)
// {
//     $roles1 = Role::findById($id);
//     return view('roles.index',compact('roles1'));
// }
//echo $roles_id."____".$role;exit;
// $roles = Role::where('id',$roles_id)
//                 ->update([
    //                     'name'  => $role
    //                 ]);
    //$roles->name = $roles_name;
//$roles->save();