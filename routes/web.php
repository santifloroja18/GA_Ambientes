<?php

use App\Http\Controllers\AuditoriumController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\EnvironmentstockController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

// ruta de inicio de sesion la cual tiene el formulario de register, login y no estan protegidas por el auth

Route::view('/',"welcome")->name('welcome');

Route::get('/login',[AuthController::class,'index'])->middleware('guest')->name('login');


// rutas para enviar la informacion para registrar o iniciar sesion y no estan protegidas por el auth

Route::post('/login-validate',[AuthController::class,'login'])->name('login-validate');

Route::post('/register-store',[AuthController::class,'register'])->name('register-store');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');


// rutas protegidas luego de login

Route::middleware('auth')->group( function (){

    // Route::view('/dashboard',"dashboard")->name('dashboard');
    Route::get('/dashboard',[DashboardController::class,'index']) -> name('dashboard');


    // Rutas para el control de pisos
    Route::get('/floors', [FloorController::class, 'index'])->name('floors');
    Route::post('/floor', [FloorController::class, 'store'])->name('floor.store');
    Route::post('/floor-save', [FloorController::class, 'save'])->name('floor.save');
    Route::delete('/floor/{id?}', [FloorController::class, 'destroy'])->name('floor.destroy');
    Route::get('/floors/{id}', [EnvironmentController::class, 'rooms']);
    Route::get('/floor/{id}/edit', [FloorController::class, 'edit'])->name('floor.edit');
    Route::patch('/floor/{id}', [FloorController::class, 'update'])->name('floor.update');
    Route::get('/environs/{envi?}', [FloorController::class, 'environs'])->name('floor.environs');
    //Rutas para el control de ambientes
    
    Route::get('/environs/{id?}', [EnvironmentController::class, 'show'])->name('environs.show');
    Route::put('/environs/{id?}', [EnvironmentController::class, 'update'])->name('environs.update');
    Route::delete('/environs/{envi?}', [EnvironmentController::class, 'destroy'])->name('environs.destroy');
    //Rutas para el control de inventarios
    Route::post('/environment-store', [EnvironmentController::class, 'store'])->name('environment.store');
    Route::get('/environmentStock/{id?}/{fl?}', [EnvironmentstockController::class, 'elementStock'])->name('element.stock');
    Route::post('/environmentStock-store', [EnvironmentstockController::class, 'storeStock'])->name('element.store');
    Route::put('/environmentStock-update/{id?}', [EnvironmentstockController::class, 'updateStock'])->name('element.update');
    Route::delete('/environmentStock-destroy/{id?}', [EnvironmentstockController::class, 'destroyStock'])->name('element.destroy');
    Route::get('/environmentStockExport', [EnvironmentstockController::class, 'export'])->name('export');
    // rutas de las vistas de los auditorios (301 - 601)
    Route::get('/reservas-auditorio-tres-cero-uno', [AuditoriumController::class,'indexAuditoriumTres'])->name('reservas-auditorio-301');
    Route::post('/auditoriumTres', [AuditoriumController::class, 'storeTres'])->name('auditorium.storeTres');
    Route::get('/show-reservas-tres', [AuditoriumController::class, 'showAuditoriumTres']);
    Route::get('/auditoriumTres/{id}/edit', [AuditoriumController::class, 'editAuditoriumTres'])->name('auditoriumTres.edit');
    Route::delete('/auditorium-deleteTres/{id}',[AuditoriumController::class,'destroyTres'])->name('auditoriumTres.destroy');

    Route::get('/reservas-auditorio-seis-cero-uno', [AuditoriumController::class,'indexAuditoriumSeis'])->name('reservas-auditorio-601');
    Route::post('/auditoriumSeis', [AuditoriumController::class, 'storeSeis'])->name('auditorium.storeSeis');
    Route::get('/show-reservas-seis', [AuditoriumController::class, 'showAuditoriumSeis']);
    Route::get('/auditoriumSeis/{id}/edit', [AuditoriumController::class, 'editAuditoriumSeis'])->name('auditoriumSeis.destroy');;
    Route::delete('/auditoriumSeis-delete/{id}',[AuditoriumController::class,'destroySeis'])->name('auditoriumSeis.destroy');

    Route::put('/auditorium/{id}', [AuditoriumController::class, 'update'])->name('auditorium.update');


    
    // rutas de las vistas schedule
    Route::get('/schedules', [ScheduleController::class, 'index'])->middleware('can:schedules')->name('schedules');
    Route::get('/schedule/create',[ScheduleController::class, 'create'])->middleware('can:schedule.create')->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'import'])->name('schedule.import');




    // rutas de las vistas users
    Route::get('/users', [UserController::class,'index'])->middleware('can:user.index')->name('users');
    Route::get('/user/create',[UserController::class, 'create'])->middleware('can:user.create')->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');

     

    // rutas de la vista y form para editar rol de usuario
    Route::get('/user/{user}/edit-role', [UserController::class, 'editRole'])->name('user.editRole');
    Route::patch('/user-role/{user}', [UserController::class, 'updateRole'])->name('user.updateRole');



    // rutas para prestar ambientes

    Route::post('/loan-search', [LoanController::class, 'search'])->name('loan.search');
    Route::post('/loan', [LoanController::class, 'store'])->name('loan.store');

    Route::delete('/loan-delete/{id}',[LoanController::class, 'cerrar'])->name('loan.delete');
});