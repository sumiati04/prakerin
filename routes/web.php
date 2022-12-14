<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;


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

Route::get('/about', 'MyController@showAbout');
// Route::get('/about', function () {
    // return view('about');
    // . 'Selamat datang di webappsaya<br>'
    // . 'Laravel, emang keren.';
// });

Route::get('/testmodel', function () {
    $query =Post::all();
    return $query;
});
Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::group(['middleware' => ['auth'],
'prefix' => 'client-area'], function(){
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function(){
    Route::get('profile', function(){
        return view('profile');
    });
});

Route::get('/errors', function(){
    return view('403');
});