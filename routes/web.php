<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AulaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PersonaController;

Route::get('/', function () {
    //return view('welcome');
    return redirect('/admin');
});

Route::middleware(['auth'])->prefix('admin')->group(function(){
    


    Route::get("/", function(){
        return view('admin.index');
    })->name("administracion"); 

    //ASIGNACION DE MATERIAS
    Route::get("asignacion_materias", [MateriaController::class,"asignacion_materias"])->name("asignacion_materias");

    
    Route::resource("aula", AulaController::class);
    Route::resource("curso", CursoController::class);
    Route::resource("periodo", PeriodoController::class);
    Route::resource("usuario", UsuarioController::class);
    Route::resource("materia", MateriaController::class);
    Route::resource("persona", PersonaController::class);
});






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
