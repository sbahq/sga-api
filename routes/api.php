<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teste/{id}', function ($id) {
    return response()->json($id, 200);
});

Route::group([
    'middleware' => ['api', 'check.oauth.permission']
], function ( $router ) {

    Route::group([
        'prefix' => 'socio'
    ], \App\Routers\SocioRouter::instance()->router( $router ));

    Route::group([
        'prefix' => 'instrutor'
    ], \App\Routers\InstrutorRouter::instance()->router( $router ));

    Route::group([
        'prefix' => 'regional'
    ], \App\Routers\RegionalRouter::instance()->router( $router ));

    Route::group([
        'prefix' => 'cet'
    ], \App\Routers\CetRouter::instance()->router( $router ));

    Route::group([
        'prefix' => 'vaga'
    ], \App\Routers\VagaRouter::instance()->router( $router ));

});