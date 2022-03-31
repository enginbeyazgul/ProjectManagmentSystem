<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutAll extends Controller
{
    public function logoutAll(){
        Session::flush();
        return redirect('/')->withErrors(['msg' => 'Çıkış yapıldı.','alert'=>'alert-success']);
    }
}
