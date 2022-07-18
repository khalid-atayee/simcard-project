<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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


}
