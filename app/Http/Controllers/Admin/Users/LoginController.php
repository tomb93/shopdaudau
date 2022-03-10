<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
       return view('admin.users.login',[
           'title'=> 'Đăng Nhập Hệ Thống'
       ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        if(Auth::attempt([
            'email'=> $request->input('email'),
            'password'=>$request->input('password')
        ],$request->input('remember') )){
            return redirect()->route('admin');
        }
        else{ 
            $request->session()->flash('error','Email hoặc Password không đúng');
            return redirect()->back();

        }
    }
}
