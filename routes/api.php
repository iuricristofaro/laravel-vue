<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


/**
$this->get('categories', 'Api\CategoryController@index');
$this->post('categories', 'Api\CategoryController@store');
$this->put('categories/{id}', 'Api\CategoryController@update');
$this->delete('categories/{id}', 'Api\CategoryController@delete');
 */

$this->post('auth', 'Auth\AuthApiController@authenticate');
$this->post('auth-refresh', 'Auth\AuthApiController@refreshToken');
$this->get('me', 'Auth\AuthApiController@getAuthenticatedUser');

$this->group([
    'prefix' => 'v1',
    'namespace' => 'Api\v1',
    'middleware' => 'auth:api'
], function () {

    $this->get('categories/{id}/products', 'CategoryController@products');
    $this->apiResource('categories', 'CategoryController');

    $this->apiResource('products', 'ProductController');
});