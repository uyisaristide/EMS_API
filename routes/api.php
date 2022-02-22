<?php

use App\Http\Controllers\AuthController;
use  App\Http\Controllers\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login',[AuthController::class,'login']);

Route::post('/register',[AuthController::class,'register']);

Route::get('employees', [EmployeesController::class,'index']);

Route::post('employees/{id}', [EmployeesController::class,'show']);

Route::get('/employees/search/{name}',[EmployeesController::class,'search']);

Route::group(['middleware'=>['auth:sanctum']],function () {

        Route::post('employees', [EmployeesController::class,'store']);

        Route::put('employees/{id}', [EmployeesController::class,'update']); 
        
        Route::delete('employees/{id}', [EmployeesController::class,'destroy']);

        Route::post('/logout',[AuthController::class,'logout']);

    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
