<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Svg\Tag\Rect;

class userController extends Controller
{
    //

    function userIndex()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    function retrieve()
    {
        $users = User::all();
        return response()->json(['status' => 200, 'users' => $users]);
    }

    function userform()
    {
        return view('users.simpleForm');
        // dd('ok');
    }

    function formSubmit(Request $request)
    {

        // dd($request->file('logo'));
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'cpassword' => 'required|same:password',
                'phone' => 'required|regex:/^(07)[0-9]{8}$/',

            ],
            [
                'name.required' => 'اسم ضروری میباشد',
                'name.string' => 'اسم باید به حروف باشد',
                'email.required' => 'ایمیل ضروری میباشد',
                // 'email.email'=>' ایمیل را به فارمت درست بنویسید',
                'email.unique' => 'ایمیل باید تکرار نباشد',
                'password.required' => 'رمز ورودی ضروری میباشد',
                'cpassword.required' => 'تاییدی رمز ورودی ضروری میباشد',
                'cpassword.same' => 'رمز ورودی و تاییدی رمز یکسان نمی باشد',
                'phone.required' => 'نمبر تماس ضروری میباشد',
                'phone.regex' => 'نمبر تماس را به فارمت درست بنویسید',

            ]
        );


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $password = bcrypt($request->password);
            $cpassword = bcrypt($request->cpassword);
            $user->password = $password;
            $user->confirm_password = $cpassword;
            $user->phone = $request->phone;
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->file('logo')->move('userImage', $imagename);
                $user->image = $imagename;
            }
            $user->save();
            $users = User::all();
            $html_content = view('users.data', compact('users'))->render();
            return response()->json(['html_content' => $html_content, 'message' => 'رکارد موفقانه اضافه گردید'], 200);
        }
    }


    function userDelete($id = 0)
    {
        // dd($id);
        // dd(public_path().'/userImage');
        // dd($request->user_id);

        // $user_id = $request->user_id;
        $user = User::find($id);
        if ($user->hasRole('admin')) {
            return response()->json(['status' => 401, 'errors' => 'رول شما ادمین است'], 401);
        } else {
            $user_image  = $user->image;
            

            $path = public_path() .'/userImage/'.$user_image;
            
            // dd($path);
            if (file_exists($path) && $user_image!=null) {
                unlink($path);
                $user->delete();
            } else {
                $user->delete();
            }
            $users = User::all();
            $html_content = view('users.data', compact('users'))->render();

            return response()->json(['message' => 'یوزر موفقانه حذف گردید', 'html_content' => $html_content], 200);
        }
    }

    function assignRoleTo($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.userRole', compact('user', 'roles'));
    }

    function userRoleForm(Request $request, $id)
    {
        $user = User::find($id);
        $user->assignRole($request->role_name);
        $roles = Role::all();
        return view('users.fetchUsers', compact('user','roles'));
    }

    function userRevokeRole(Request $request){
        $user = $request->user_id;
        $role = $request->role_id;
        $user = User::find($user);
        $roles = Role::all();
        // dd($role);
        $role = Role::find($role);
        if($user->hasRole($role)){
            $user->removeRole($role);
            $html_content = view('users.fetchUsers', compact('user','roles'))->render();
            return response()->json(['message'=>'رول موفقانه حذف گردید', 'html_content'=>$html_content],200);
        }
        else
        {
            return response()->json(['error'=>'رول یافت نشد','status'=>409],409);
        }

      
    }

    function userAssignPermission($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        return view('users.userPermission',compact('user','permissions'));
    }

    function givePermissionToUser(Request $request,$id){
        // dd($request->all());
        $user = User::find($id);

        $user->givePermissionTo($request->permission_name);
        $permissions = Permission::all();
        return view('users.fetchUserPermission', compact('permissions','user'));
           
     


    
    }

    function revokePermission(Request $request)
    {
        // dd($request->all());
        $user = $request->user_id;
        $permission = $request->permission_id;
        $user = User::find($user);
        $permission = Permission::find($permission);
        $user->revokePermissionTo($permission);
        $permissions = Permission::all();
        return view('users.fetchUserPermission',compact('user','permissions'));


    }

    function backToMain()
    {
       $users = User::all();
       return view('users.data',compact('users'));
    }

    function profile()
    {
  
       return view('users.userProfile');
    }




    
    
}
    
    // |regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
    // 'name.regex'=>'اسم شما باید به حروف باشد',
    // $view= view('users.file');
    // return response()->view('users.file');
    // return response()->json(['html'=>$view],200);
    // $html_content=view('users.index')->render();
    // return response()->json(['html_content'=>$html_content],200);
    // return response()->json(array('success'=>true, 'html_content'=>$html_content));