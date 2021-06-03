<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Livewire\ResponsablsComponent;
use Livewire\ParticipantsComponent;
use Livewire\MenuCursosInscComments;
use Livewire\InscriptionComp;
use Livewire\AdmMensaj;
// use Illuminate\Support\Facades\Email;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use App\Mail\ContactanosMailable;
use App\Role;

// //---------USER
Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/auth/registrarse', function(){
 	$roles = App\Role::all();
 	$quests = App\Question::all();
 	$profs = App\Profession::all();
 	return view('auth.register',compact('roles','quests','profs'));
})->name('register');

Route::post('/Registrar', 'Auth\RegisterController@create')->name('saveregist');
Route::get('/auth/AdmUsers/tool', 'Auth\RegisterController@index')->name('AdmUser')->middleware('verified');
Route::get('/auth/AdmUser/detalle/{id}', 'Auth\RegisterController@ver')->name('ver')->middleware('verified');
Route::post('/auth/AdmUser/detalle/{id}', 'Auth\RegisterController@statud')->name('statud')->middleware('verified');




Route::get('/img', function () {
    return view('img');
});



Route::get('/search', function () {
    return view('search');
});







Route::get('/', function () {
    return view('home');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/nosotros', function () { //oculto layouts.app
    return view('Menu.nosotros');
})->name('nosotros');


Route::get('/contactanos', function () {
    return view('Menu.contactanos');
})->name('contactanos');


Route::get('/aula-virtual', function() {
	return view('Menu.Aulas.index');
})->name('aulas');


Route::get('/Menssage-Enviado', function() {
	return view('send');
})->name('send');


//integradas rutas al componente MenuCursosInscComments 
Route::get('/cursos/{id?}', function () {   
    return view('Menu.Cursos_Insc_Comm.index');
})->name('cursos-menu');




Route::get('/participar/{id?}', function () {   
    return view('Insc.index');
})->name('insc');

//para descargas de file /storage
Route::get('/storage/{file}' , 'Controller@downloadFile');




// RUTAS ADMIN PR0TEGIDAS
Route::get('/admin-cursos','CursController@index')->name('cursos')->middleware('verified');
Route::get('/detaill-curso/{id}', 'CursController@show')->name('detaill')->middleware('verified');
Route::get('/new-curso', 'CursController@create')->name('Newcurso')->middleware('verified');
Route::post('/new-curso','CursController@store')->name('SaveCurso')->middleware('verified');
Route::get('/edit-curs/{id?}', 'CursController@edit')->name('EditCurs')->middleware('verified');
// Route::put('/edit-curs/{id}', function($id){
// 	$update = App\Curso::findOrFail($id); 
// 	return $update;
// })->name('UpCurso');
Route::put('/edit-curs/{id}','CursController@update')->name('UpCurso')->middleware('verified');
Route::post('/edit-curs/{id}','CursController@statud')->name('statud')->middleware('verified');
// Route::resource('post','PostController');

//rutas livewire Protegidas (ADMIN)
Route::middleware('auth:web')->group(function () { //esta dos veces protegidas

    Route::get('/privileged-user', function(){
		return view('Admin.tool');
	})->name('Admin')->middleware(['auth','verified']);

    Route::get('/Responsabls',function(){
		return view('Admin.responsabls/index');
	})->name('resp-livew')->middleware(['auth','verified']);
	                           	
	Route::get('/Participants',function(){	
		return view('Admin.participants.index');
	})->name('part-livew')->middleware(['auth','verified']);
 	

	Route::get('/Admin-class', function() {
		return view('Admin.Class.index');
	})->name('class')->middleware(['auth','verified']);

	
	Route::get('/admin-inscription',function(){
		//$reg = App\Incription::with('curs')->get();		
		return view('Admin.Inscrip.index');
	})->name('insc-auth')->middleware(['auth','verified']);

	Route::get('/Mensajes',function(){
		//$reg = App\Incription::with('curs')->get();		
		return view('Admin.Mensaj.index');
	})->name('mensajs')->middleware(['auth','verified']);
	

	Route::get('/Admin.inscription', InscriptionComp::class,'destroy');
		//RUTAS PDF
	Route::get('/Admin.inscription/{id}', 'PdfController@ConfPDF')->name('ConfPDF');
	Route::get('/Participantes', 'PdfController@ExpPart')->name('ExpPart');
	Route::get('/Respons|Facilitadores', 'PdfController@ExpResp')->name('ExpResp');
	Route::get('/ExpCurso', 'PdfController@ExpCurso')->name('ExpCurso');
    
});





Route::get('/salir', function(){
        Auth::logout();
        return Redirect::to('/')->with('msj', 'Gracias por visitarnos!.');
});


// Route::get('/Admin.mensajes',  AdmMensaj::class);
// Route::get('/cursos/{id?}', MenuCursosInscComments::class)->name('cursos.index');

// Route::get('/key',function(){
// 	$key = Str::random(32);
// 	return $key;
// });


// Route::get('email', function(){
// 	$correo = new ContactanosMailable;
// 	Mail::to('curs.onli2021@gmail.com')->send($correo);
// 	return "Mensaje enviado";
// });

// use Illuminate\Support\Str;
// use App\Incription;
// use App\User;
// use App\Profession;
// use App\Curso;

// Route::get('/db', function(){
// 	$db= DB::table("role_user")
//     ->insert([
//         "user_id" => 1,
//         "role_id" => 2,
//     ]);
//     return $db;
// });

//SUBIR PDF