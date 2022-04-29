<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
     return view('welcome');
});
// */
// Route::get('/about',function(){
//     return view('pages.about');
// });
// Route::get('/index',function(){
//     return view('pages.index');
// });

// for pages

route::get('/','pagescontroller@index');
route::get('/about','pagescontroller@about');
route::get('/services','pagescontroller@services');
route::get('/contact','pagescontroller@Contact');



Route::post('/send-email', [App\Http\Controllers\Mailcontroller::class, 'sendEmail'])->name('contact.send');

// for posts
route::resource('posts','Postscontroller');


// for notes

route::get('/first','DcomController@first');
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
