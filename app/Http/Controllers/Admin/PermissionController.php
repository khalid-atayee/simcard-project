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
        $count=1;
       $permissions = Permission::paginate(5);
        return view('permissions.index',compact('permissions','count'));
    }

    function pagintionRecords(Request $request)
    {
        if($request->ajax()){
       
            $page = $request->page_num;       
            $pagination_record_count=5;
            
            $permissions = Permission::paginate($pagination_record_count);
            $count=$pagination_record_count*$page-$pagination_record_count+1;

            return view('permissions.permissionContent',compact('permissions','count'))->render();
        }
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
            ],400);
        }

        $hidden_id = $request->hidden_id;
        // $hidden_name = $request->hidden_name;
        if(!isset($hidden_id))
        {
            $permission = new Permission;
            $permission->name=$request->permissionName;
            $permission->save();
            // $permissions = Permission::all();
            $count=1;
            $permissions = Permission::paginate(5);
            // return view('permissions.permissionContent',compact('permissions','count'))->render();
            $html_view = view('permissions.permissionContent',compact('permissions','count'))->render();
            return response()->json([
                'status'=>200,
                'html_view'=>$html_view,
                'message'=>'صلاحیت موفقانه اضافه گردید'
            ],200);
            
        }
        else
        {
            $permission = Permission::find($hidden_id);
            $permission->name = $request->permissionName;
            $permission->update();
            // $permissions = Permission::all();
            $count=1;
            $permissions = Permission::paginate(5);

            $html_view = view('permissions.permissionContent',compact('permissions','count'))->render();
            return response()->json(['status'=>200, 'html_view'=>$html_view, 'message'=>'صلاحیت موفقانه ویرایش شد'],200);
            
        }

       

    }

    function delete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $count=1;
        // return $this->permissionIndex();
        $permissions = Permission::paginate(5);
            // $count=$pagination_record_count*$page-$pagination_record_count+1;

         return view('permissions.permissionContent',compact('permissions','count'))->render();
        // $permissions = Permission::all();
        // return view('permissions.permissionContent',compact('permissions'));
        
        
    }

    function update($id)
    {
        $permission = Permission::find($id);
        return response()->json(['status'=>200,'values'=>$permission]);
    }

}
