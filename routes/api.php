<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\EmployeesController;
use GuzzleHttp\Middleware;
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



Route::prefix('v1')->group(function(){


            
    Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('/login',[AuthController::class,'login']);
            Route::post('/register',[AuthController::class,'register']);

            Route::get('employees', 'App\Http\Controllers\Api\V1\EmployeesController@index');

            Route::get('employees/{id}', 'App\Http\Controllers\Api\V1\EmployeesController@show');

            Route::get('/employees/search/{name}','App\Http\Controllers\Api\V1\EmployeesController@index');
            

            Route::group(['middleware'=>['auth:sanctum']],function () {

                Route::post('employees', 'App\Http\Controllers\Api\V1\EmployeesController@store');

                    Route::put('employees/{id}', 'App\Http\Controllers\Api\V1\EmployeesController@update'); 
                    
                    Route::delete('employees/{id}', 'App\Http\Controllers\Api\V1\EmployeesController@destroy');

                    

    
            });
});

// Route::group([
//         'prefix'=>'v1',
//         'as'=>'api',
//         'namespace'=>'App\Http\Controllers\Api\V1',
//         'middleware'=>['auth:sanctum']

//         ],
//         function(){
//             Route::apiResource('employees','EmployeesController');
//         }
//     );




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
