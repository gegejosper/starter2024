<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function sendVerificationEmail(){
        $user = User::findOrFail(1);
        $user->sendEmailVerificationNotification();
        return response()->json(['message' => 'Email verification notification sent']);
    }

    public function dashhoard(){
        return view('dashboard');
    }
    public function show(){
        $page_name = 'Users';
        $users = User::with('roles')->paginate(10);
        return view('users.users',compact('page_name', 'users'));
    }
}
