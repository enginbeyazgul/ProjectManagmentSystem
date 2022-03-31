<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        $data['title'] = "Giriş Ekranı";
        return view('layouts.login',$data);
    }
    public function loginControl(Request $request){
        $incomingMail = $request->mail;
        $incomingPass = $request->pass;
        $resulta = DB::select('select * from User where email = :email and password = :password and user_group_id = :user_group_id', ['email' => $incomingMail,'password' => md5($incomingPass), 'user_group_id' => 1]);
        $resultt = DB::select('select * from User where email = :email and password = :password and user_group_id = :user_group_id', ['email' => $incomingMail,'password' => md5($incomingPass), 'user_group_id' => 2]);
        $results = DB::select('select * from User where email = :email and password = :password and user_group_id = :user_group_id', ['email' => $incomingMail,'password' => md5($incomingPass), 'user_group_id' => 3]);
        if ($resulta) {
            Session::put('aMail',$incomingMail);
            Session::put('aPassword',$incomingPass);
            return redirect('admin');
        }
        else if ($resultt) {
            Session::put('tMail',$incomingMail);
            Session::put('tPassword',$incomingPass);
            return redirect('teacher');
        }
        else if ($results) {
            Session::put('sMail',$incomingMail);
            Session::put('sPassword',$incomingPass);
            return redirect('student');
        }
        else{
            return redirect()->back()->withErrors(['msg' => 'Kullanıcı adı veya şifre hatalı..','alert'=>'alert-danger']);
        }
    }
}
