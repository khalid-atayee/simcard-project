<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    function permissionIndex()
    {
       
        return view('permissions.index');
    }


    
    function retrieve()
    {
        
        // exit('ok');
        $permissions = Permission::all();
        // echo "<pre>"; print_r($permissions);exit;

        return response()->json([
            'status'=>200,
            'permissions'=>$permissions
        ]);
    }


    function create(Request $request)
    {
        $validator = validator::make($request->all(),
        [
        'permissionName'=>'required'
        ],
        [
            'permissionName.required'=>'اسم صلاحیت ضروری میباشد'

        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'error'=>$validator->errors()
            ]);
        }

        $hidden_id = $request->hidden_id;
        // $hidden_name = $request->hidden_name;
        if(!isset($hidden_id))
        {
            $permission = new Permission;
            $permission->name=$request->permissionName;
            $permission->save();
            return response()->json([
                'status'=>200,
                'message'=>'صلاحیت موفقانه اضافه گردید'
            ]);
            
        }
        else
        {
            $permission = Permission::find($hidden_id);
            $permission->name = $request->permissionName;
            $permission->update();
            return response()->json(['status'=>200, 'message'=>'صلاحیت موفقانه ویرایش شد']);
            
        }

       

    }

    function delete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return response()->json(['status'=>200,'message'=>'صلاحیت موفقانه حذف گردید']);
    }

    function update($id)
    {
        $permission = Permission::find($id);
        return response()->json(['status'=>200,'permission'=>$permission]);
    }

}
