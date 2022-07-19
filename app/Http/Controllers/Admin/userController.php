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
        return view('users.index');
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
            'email'=>'required',
            'password'=>'required',
            'cpassword'=>'required|same:password',
            'phone'=>'required|regex:/^(07)[0-9]{8}$/',
  
        ],
        [
            'name.required'=>'اسم ضروری میباشد',
            'name.string'=>'اسم باید به حروف باشد',
            'email.required'=>'ایمیل ضروری میباشد',
            'password.required'=>'رمز ورودی ضروری میباشد',
            'cpassword.required'=>'تاییدی رمز ورودی ضروری میباشد',
            'cpassword.same'=>'رمز ورودی و تاییدی رمز یکسان نمی باشد',
            'phone.required'=>'نمبر تماس ضروری میباشد',
            'phone.regex'=>'نمبر تماس را به فارمت درست بنویسید',
            
        ]);
        
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors()
            ]);
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
                // $users= User::all();
                // return view('users.showuser',compact('users'));
                return response()->json(['status'=>200, 'message'=>'یوزر موفقانه ایجاد گردید']);
                
            
       }
            
            
            
            
               
        }
        
        
    }
    
    // |regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
    // 'name.regex'=>'اسم شما باید به حروف باشد',