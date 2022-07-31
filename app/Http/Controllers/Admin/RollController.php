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

        $roles = Role::all();
       
        return view('roles.index',compact('roles'));
    }

    // function getData()
    // {
    //     $roles = Role::all();
    //     return response()->json([
    //         'status'=>200,
    //         'roles'=>$roles
    //     ]);
    // }
    function create(Request $request)
    {
        //echo "<pre>"; print_r($_POST);exit;
        // dd($request->all());
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
            ],400);
        }
        
        if(!isset($request->hidden_id))
        {
           
            $roles = new Role;
            $roles->name = $request->rolename;
            $roles->save();
            $roles = Role::all();
            $html_view = view('roles.rolesTable',compact('roles'))->render();
            return response()->json(['status'=>200,'html_view'=>$html_view,'message'=>'رول موفقانه اضافه گردید'],200);

        }
        else 
        {
            
            $role_id = $request->hidden_id;
            $role_name = $request->rolename; 

            $role = Role::find($role_id);
            $role->name = $role_name;
            $role->update();
            $roles = Role::all();
            $html_view = view('roles.rolesTable',compact('roles'))->render();
            return response()->json(['status'=>200,'html_view'=>$html_view,'message'=>'رول موفقانه ویرایش گردید'],200);
           
        }
        
        
    }

    function delete($id)
    {
        $roles  = Role::find($id);
        $roles->delete();
        $roles  = Role::all();
        return view('roles.rolesTable',compact('roles'));
    }
    
    function update($id)
    {
        $role = Role::find($id);
        return response()->json([
            'values'=>$role
        ],200);
    }

    function roleInfo($id)
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
            return response()->json(['error'=>'صلاحیت در رول موجود است'],409);

        }
        $role->givePermissionTo($permission_name);
        $permissions = Permission::all();
        $html_view = view('roles.assignPermissionView',compact('role','permissions'))->render();
        return response()->json(['html_view'=>$html_view,'message'=>'صلاحیت اضافه گردید'],200);
           

        // return response()->json(['message'=>'']); 
        


    }

    function getPermissions($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);


        return view('roles.roleHasPermission',compact('permissions','role'));

    }

    function removePermission(Request $request)
    {
        $role_id = $request->role_id;
        $permission_id = $request->permission_id;

        // dd($role_id,$permission_id);

        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);
        $role->revokePermissionTo($permission);

        $permissions = Permission::all();
        // $role = Role::find($id);
       

        $html_view = view('roles.assignPermissionView',compact('permissions','role'))->render();
        return response()->json(['html_view'=>$html_view,'message'=>'رکارد موفقانه حذف گردید'],200);

    }

    function backToRole()
    {
        $roles  = Role::all();
        return view('roles.rolesTable',compact('roles'));


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