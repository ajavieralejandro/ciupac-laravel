<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LocationController;


use App\Http\Middleware\IsAdmin;




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

Route::get('/',[PagesController::class,'index']);
Route::resource('/blog',PostController::class);

/*Route::get('/', function () {
    return view('welcome');
});*/
Auth::routes();
Route::group([
            'middleware' => IsAdmin::class], function() {
                Route::get('/admin',[PagesController::class,'admin'])->name('admin');
                Route::get('/team', [\App\Http\Controllers\TeamController::class, 'index'])->name('team');
                Route::put('/team', [\App\Http\Controllers\TeamController::class, 'updateMember'])->name('updateMember');
                
                Route::get('/team/{id}', [\App\Http\Controllers\TeamController::class, 'editMember'])->name('editMember');
                Route::get('/addmember', [\App\Http\Controllers\TeamController::class, 'addMember'])->name('addMember');
                Route::get('/uploadImage',[\App\Http\Controllers\ImageController::class, 'index'])->name('newImage');
                Route::post('/uploadImage',[\App\Http\Controllers\ImageController::class, 'store'])->name('uploadImage');
                Route::post('/addmember',[\App\Http\Controllers\TeamController::class, 'storeMember'])->name('storeMember');
                Route::delete('/team',[\App\Http\Controllers\TeamController::class, 'deleteMember'])->name('deleteMember');


                //location routes
                Route::get('/locations', [\App\Http\Controllers\LocationController::class, 'index'])->name('locations');
                Route::post('/locations', [\App\Http\Controllers\LocationController::class, 'store'])->name('newLocation');
                Route::get('/newLocation', [\App\Http\Controllers\LocationController::class, 'create'])->name('createLocation');
                Route::get('/location/{id}', [\App\Http\Controllers\LocationController::class, 'show'])->name('showLocation');
                Route::put('/location',[\App\Http\Controllers\LocationController::class, 'update'])->name('updateLocation');
                Route::delete('/location',[\App\Http\Controllers\LocationController::class, 'destroy'])->name('deleteLocation');

                //logos routes
                Route::get('/logos', [\App\Http\Controllers\LogoController::class, 'index'])->name('logos');
                Route::get('/logos/{id}', [\App\Http\Controllers\LogoController::class, 'show'])->name('editLogo');

                Route::get('/addlogo', [\App\Http\Controllers\LogoController::class, 'create'])->name('addLogo');
                Route::post('/logo', [\App\Http\Controllers\LogoController::class, 'store'])->name('storeLogo');
                Route::delete('/logo',[\App\Http\Controllers\LogoController::class, 'destroy'])->name('deleteLogo');



                //post routes
                Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
                Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('createPost');

                Route::get('/newpost', [\App\Http\Controllers\PostController::class, 'create'])->name('newPost');
                Route::get('/editposts/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('editPost');
                Route::put('/editpost', [\App\Http\Controllers\PostController::class, 'update'])->name('updatePost');

                
                });

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
