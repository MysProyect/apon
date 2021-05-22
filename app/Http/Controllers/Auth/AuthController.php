<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class AuthController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','verified']);
    }

    public function index(){
         $users = App\User::paginate(10);
        return view('auth/AdmUsers/tool',compact('users'));
    }

    public function ver($id){
        $user = App\User::findOrFail($id);
        return view('auth/AdmUsers/detalle',compact('user'));
    }
}
