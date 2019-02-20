<?php

use Dingo\Api\Routing\Router;

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

// Create Dingo Router
$api = app(Router::class);

// Create a Dingo Version Group
$api->version('v1', ['middleware' => 'api'], function ($api) {
    $api->group(['prefix' => 'auth'], function ($api) {
        $api->post('register', [
            'as' => 'register',
            'uses' => 'App\\Api\\V1\\Controllers\\RegisterController@register',
        ]);

        $api->post('login', [
            'as' => 'login',
            'uses' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        ]);

        $api->get('logout', [
            'middleware' => 'auth:api',
            'as' => 'logout',
            'uses' => 'App\\Api\\V1\\Controllers\\LogoutController@logout',
        ]);

        $api->post('recovery', [
            'as' => 'password.email',
            'uses' => 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail',
        ]);
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

    });

    //hall route
    $api->version('v1', function ($api) {
        $api->get('halls', 'App\\Http\\Controllers\\HallController@index');
    });

    // Protected routes
    $api->group(['middleware' => 'auth:api'], function ($api) {
        $api->get('protected', function () {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.',
            ]);
        });
        $api->get('user', [
            'uses' => 'App\\Api\\V1\\Controllers\\UserController@user',
        ]);
        $api->get('users', [
            'as' => 'users.index',
            'uses' => 'App\\Api\\V1\\Controllers\\UserController@index',
        ]);

        $api->get('users/{user}', [
            'as' => 'users.show',
            'uses' => 'App\\Api\\V1\\Controllers\\UserController@show',
        ]);
    });

    //Admin protected group
    $api->group(['middleware' => ['auth:api', 'role'], 'prefix' => 'admin'], function ($api) {
        $api->get('/', [
            'as' => 'admin.index',
            'uses' => 'App\Http\Controllers\Admin\\AdminController@index'
        ]);
        $api->get('/hall/create', [
            'as' => 'hall.create',
            'uses' => 'App\\Http\\Controllers\\HallController@create'
        ]);
        $api->get('/hall/create', [
            'as' => 'hall.create',
            'uses' => 'App\\Http\\Controllers\\HallController@create'
        ]);
        $api->delete('hall/{id}', [
            'as' => 'hall.destroy',
            'uses' => 'App\\Http\\Controllers\\HallController@destroy'
        ]);
        
    });
});
