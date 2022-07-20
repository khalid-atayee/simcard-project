<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //

    function userIndex()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    function retrieve()
    {
        $users = User::all();
        return response()->json(['status'=>200,'users'=>$users]);

    }

    function userform()
    {
        return view('users.simpleForm');
        // dd('ok');
    }

    function formSubmit(Request $request)
    {

    //    echo "<pre>"; print_r($request->file('logo'));exit;
    // if($request->hasFile('logo'))
    // {
    //     dd('ok');
    // }
        
        // dd($request->file('logo'));
        // echo $request->file('logo');exit;
            $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'cpassword'=>'required|same:password',
            'phone'=>'required|regex:/^(07)[0-9]{8}$/',
  
        ],
        [
            'name.required'=>'اسم ضروری میباشد',
            'name.string'=>'اسم باید به حروف باشد',
            'email.required'=>'ایمیل ضروری میباشد',
            // 'email.email'=>' ایمیل را به فارمت درست بنویسید',
            'email.unique'=>'ایمیل باید تکرار نباشد',
            'password.required'=>'رمز ورودی ضروری میباشد',
            'cpassword.required'=>'تاییدی رمز ورودی ضروری میباشد',
            'cpassword.same'=>'رمز ورودی و تاییدی رمز یکسان نمی باشد',
            'phone.required'=>'نمبر تماس ضروری میباشد',
            'phone.regex'=>'نمبر تماس را به فارمت درست بنویسید',
            
        ]);
        
        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()],400);
        }
    
    
       else 
       {
                $user = new User;
                $user->name = $request->name;
                $user->email=$request->email;
                $password= bcrypt($request->password);
                $cpassword = bcrypt($request->cpassword);
                $user->password=$password;
                $user->confirm_password=$cpassword;
                $user->phone=$request->phone;
                if($request->hasFile('logo'))
                {
                    $image = $request->file('logo');
                    $imagename=time().'.'.$image->getClientOriginalExtension();
                    $request->file('logo')->move('userImage',$imagename);
                    $user->image = $imagename;
                   
                }
                $user->save();
                $users = User::all();
                $html = view('users.data',compact('users'))->render();
                return response()->json(['status'=>true, 'html'=>$html,'message'=>'رکارد موفقانه اضافه گردید'],200);

                
            
            }
            
            
            
            
            
        }


        function userDelete(Request $request)
        {
            // dd($request->user_id);
            
            $user_id = $request->user_id;
            $user = User::find($user_id);
            if($user->hasRole('admin')){
                return response()->json(['status'=>401,'errors'=>'رول شما ادمین است'],401);
            }
            else
            {
                $user->delete();
                $users = User::all();
                $html_content = view('users.data',compact('users'))->render();

                return response()->json(['message'=>'یوزر موفقانه حذف گردید','html_content'=>$html_content],200);
            }
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