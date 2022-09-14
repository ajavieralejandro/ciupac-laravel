<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TeamController;
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
                Route::get('/admin',[PagesController::class,'admin']);
                Route::get('/team', [\App\Http\Controllers\TeamController::class, 'index'])->name('team');
                Route::put('/team', [\App\Http\Controllers\TeamController::class, 'updateMember'])->name('updateMember');

                Route::get('/team/{id}', [\App\Http\Controllers\TeamController::class, 'editMember'])->name('editMember');
                Route::get('/addmember', [\App\Http\Controllers\TeamController::class, 'addMember'])->name('addMember');
                Route::get('/uploadImage',[\App\Http\Controllers\ImageController::class, 'index'])->name('newImage');
                Route::post('/uploadImage',[\App\Http\Controllers\ImageController::class, 'store'])->name('uploadImage');
                Route::post('/addmember',[\App\Http\Controllers\TeamController::class, 'storeMember'])->name('storeMember');
                Route::delete('/team',[\App\Http\Controllers\TeamController::class, 'deleteMember'])->name('deleteMember');

                
                });

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
