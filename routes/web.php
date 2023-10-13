<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//use PDF;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::group(['middleware' => ['role:aspirante']],function(){
        Route::get('/solicitud',function(){return view('solicitud');})->middleware('auth');

    Route::get('/ficha-aspirante', [App\Http\Controllers\ReportesController::class, 'fichaExamen'])->middleware('auth');
    Route::get('/fichaExamen', [App\Http\Controllers\ReportesController::class, 'descargarFicha'])->middleware('auth');
    
    Route::get('/personales/{id}',[App\Http\Controllers\PersonalController::class,'show']);
    Route::post('/personales', [App\Http\Controllers\PersonalController::class,'store']);
    Route::put('/personales/{id}', [App\Http\Controllers\PersonalController::class,'update']);

    Route::get('/escolares/{id}',[App\Http\Controllers\EscolaresController::class,'show'])->middleware('auth');
    Route::post('/escolares', [App\Http\Controllers\EscolaresController::class,'store'])->middleware('auth');
    Route::put('/escolares/{id}', [App\Http\Controllers\EscolaresController::class,'update'])->middleware('auth');

    Route::get('/domicilio/{id}',[App\Http\Controllers\DomicilioController::class,'show'])->middleware('auth');
    Route::post('/domicilio', [App\Http\Controllers\DomicilioController::class,'store'])->middleware('auth');
    Route::put('/domicilio/{id}', [App\Http\Controllers\DomicilioController::class,'update'])->middleware('auth');

    Route::get('/padres/{id}',[App\Http\Controllers\PadresController::class,'show'])->middleware('auth');
    Route::post('/padres', [App\Http\Controllers\PadresController::class,'store'])->middleware('auth');
    Route::put('/padres/{id}', [App\Http\Controllers\PadresController::class,'update'])->middleware('auth');

    Route::get('/socioeconomicos/{id}',[App\Http\Controllers\SocioeconomicosController::class,'show'])->middleware('auth');
    Route::post('/socioeconomicos', [App\Http\Controllers\SocioeconomicosController::class,'store'])->middleware('auth');
    Route::put('/socioeconomicos/{id}', [App\Http\Controllers\SocioeconomicosController::class,'update'])->middleware('auth');
   
    Route::get('/opciones/{id}',[App\Http\Controllers\SolicitudesController::class,'show'])->middleware('auth');
    Route::post('/opciones', [App\Http\Controllers\SolicitudesController::class,'store'])->middleware('auth');
    Route::put('/opciones/{id}', [App\Http\Controllers\SolicitudesController::class,'update'])->middleware('auth');

    Route::get('/getFechas', [App\Http\Controllers\FechasController::class,'getFechas'])->middleware('auth');
    
    Route::get('/comprobantes',[App\Http\Controllers\ComprobantesController::class,'correccion']);
    Route::get('/comprobantes/{id}', [App\Http\Controllers\ComprobantesController::class,'show'])->middleware('auth');
    Route::post('/comprobantescool', [App\Http\Controllers\ComprobantesController::class,'store'])->middleware('auth');
    Route::post('/comprobantes/{id}', [App\Http\Controllers\ComprobantesController::class,'update'])->middleware('auth');
    //Route::apiResource('/escolares',EscolaresController::class)->middleware('auth');
    //Route::apiResource('/domicilio',DomicilioController::class)->middleware('auth');
    //Route::apiResource('/padres',PadresController::class)->middleware('auth');
    //Route::apiResource('/socioeconomicos',SocioeconomicosController::class)->middleware('auth');
    //Route::apiResource('/opciones',SolicitudesController::class)->middleware('auth');
    });
    
    Route::group(['middleware' => ['role:admin']],function(){
       
    Route::get('/solicitudes/admin',function(){return view('solicitud');})->middleware('auth');
    
    Route::get('/ficha-aspirante/{id}', [App\Http\Controllers\ReportesController::class, 'fichaAspirante'])->middleware('auth');
    Route::get('/excel',[App\Http\Controllers\ReportesController::class,'generateExcel']);
    
    Route::apiResource('/datos_personales',PersonalController::class)->middleware('auth');
    Route::apiResource('/datos_escolares',EscolaresController::class)->middleware('auth');
    Route::apiResource('/datos_domicilio',DomicilioController::class)->middleware('auth');
    Route::apiResource('/datos_padres',PadresController::class)->middleware('auth');
    Route::apiResource('/datos_socioeconomicos',SocioeconomicosController::class)->middleware('auth');
    Route::apiResource('/datos_opciones',SolicitudesController::class)->middleware('auth');

    Route::get('/consultasql/{id}',[App\Http\Controllers\ReportesController::class,'getDatosAspirante']);
    Route::get('/consultasql',[App\Http\Controllers\ReportesController::class,'getDatosAspirantes']);
    Route::get('/listComprobantes',[App\Http\Controllers\ReportesController::class,'getComprobantes']);

    Route::get('/detalle/{id}',[App\Http\Controllers\ReportesController::class,'detailAspirante']);
    Route::get('/detalle-aspirante/{aspirante}',function($id){return view('infoaspirante',['id'=>$id]);});

    Route::get('/fechasExamen',function(){return view('fechas');})->middleware('auth');
    Route::get('/fechasExamen/show', [App\Http\Controllers\FechasController::class,'getFechas'])->middleware('auth');
    Route::post('/fechasExamen/save', [App\Http\Controllers\FechasController::class,'store'])->middleware('auth');
    Route::put('/fechasExamen/update/{id}', [App\Http\Controllers\FechasController::class,'update'])->middleware('auth');
    Route::delete('/fechasExamen/delete/{id}', [App\Http\Controllers\FechasController::class,'eliminar'])->middleware('auth');

    Route::get('/users', function(){return view('usuarios');})->middleware('auth');
    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'getAllUsers'])->middleware('auth');
    Route::put('/updateUsers/{id}', [App\Http\Controllers\UserController::class,'updatePassword'])->middleware('auth');

    });
    
    Route::group([ 'middleware' => [ 'role:financiero' ]],function(){
        Route::get('/recibos',function(){return view('solicitud');})->middleware('auth');
        
        Route::get('/listComprobantes',[App\Http\Controllers\ReportesController::class,'getComprobantes']);
        Route::put('/updateListComprobantes/{id}',[App\Http\Controllers\ComprobantesController::class,'updateStatusTicket']);
        
        Route::get('/detalles/{id}',[App\Http\Controllers\ReportesController::class,'detailAspirante']);
        Route::get('/detalleAspirante/{aspirante}',function($id){return view('infoaspirante',['id'=>$id]);});
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/testUser',[App\Http\Controllers\UserController::class,'getAllUsers']);


