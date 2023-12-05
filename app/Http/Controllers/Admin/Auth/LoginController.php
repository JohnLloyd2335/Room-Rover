<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $validated = $request->validated($request->all());

        $user = User::with('userType')->where('email', $request->email)->get();
        
        if(!count($user->toArray()) > 0){
            return redirect()->route('admin.login')->with('error','User not Found');
        }

        $auth_attempt = Auth::attempt(['email' => $request->email , 'password' => $request->password]);

        if(!$auth_attempt)
        {
            return redirect()->route('admin.login')->with('error','Incorrect Password');
        }

        if(in_array($user[0]->userType->role_name,['customer']))
        {
            return redirect()->route('admin.login')->with('error','Access Denied!');
        }

        return redirect()->route('admin.dashboard');
        
    }

}
