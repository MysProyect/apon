<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
     // public function __construct(){
     //    $this->middleware('auth');
     //  }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function index(){
        $users = App\User::paginate(10);
    return view('auth/AdmUsers/tool',compact('users'));
    }

    public function ver($id){
        $user = App\User::findOrFail($id);
      //  $rol = DB::table('role_user')->select('role_id')->where('user_id',$user->id)->get();    
       return view('auth/AdmUsers/detalle',compact('user'));
    }

    public function statud($id){
          $user = App\User::findOrFail($id);
          if($user->statud == 1){
            $user->statud = 0;
            $user->save();
          }else{
            $user->statud = 1;
            $user->save();
          }
             
          return view('auth/AdmUsers/detalle',compact('user'));
    }



    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'role' => 'required',
            'nivel' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
          'username' => ['required', 'min:5', 'max:10', 'unique:users'],
            'role' => 'required',
            //'nivel' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

            $NewUser = App\User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'username' => $request['username'],
            'email_verified_at' => now(), // para pruebas
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'statud' => 1,
           ]);

       // $NewUser = App\User::create([
       //      'username' => 'maria77',
       //      'email_verified_at' => now(), // para pruebas
       //      'email' => 'maria4@ddd',
       //      'password' => Hash::make(123123),
       //      'statud' => 1,
       //     ]);
    
        $rol_user =   DB::table("role_user")
            ->insert([
               "user_id" => $NewUser->id,
               "role_id" => $request['role'],
               "nivel" => $request['nivel'],
           ]);
        
        DB::table('question_users')->insert([
             'question_id' =>  $request['question1'],
             'answer' => $request['answer1'],
           'user_id' => $NewUser->id, 
        ]);
        DB::table('question_users')->insert([
             'question_id' =>  $request['question2'],
             'answer' => $request['answer2'],
           'user_id' => $NewUser->id, 
        ]);


      if(Auth::user()){
            $NewUser->user_created = Auth::user()->id;
            $NewUser->save();
            return redirect()->route('AdmUser')->with('mensaje','¡¡¡Nuevo User registrado!!!');
       }else{
            return redirect()->route('home');        
       }
        //return  $rol_user;
      //return redirect()->route('AdmUser')->with('mensaje','¡¡¡Usuario Registrado, podra iniciar session cuando valide su email!!!');
            
   
    }
}