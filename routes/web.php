<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortraitController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\StationRegisterController;
use App\Http\Controllers\BasuraController;
use App\Http\Controllers\UserLocationController;







use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\Authenticate;




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

Route::get('/',[PagesController::class,'index'])->name('welcome');
Route::get('/coastSnap',[PagesController::class,'coastSnap'])->name('coastSnap');
Route::resource('/blog',PostController::class);
Auth::routes();
Route::get('/mediciones_basura/{month}', [\App\Http\Controllers\BasuraController::class, 'getMonthMeditions'])->name('mediciones_basura');
Route::get('/basura', [\App\Http\Controllers\BasuraController::class, 'show'])->name('basura')
->middleware(Authenticate::class);
Route::get('/basuras', [\App\Http\Controllers\BasuraController::class, 'index'])->name('basuras_index')
->middleware(Authenticate::class);
Route::post('/basura', [\App\Http\Controllers\BasuraController::class, 'store'])->name('add_medicion_basura')
->middleware(Authenticate::class);
Route::group(['middleware'=>Authenticate::class],function(){
    Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'userDashboard'])->name('userDashboard');


});
Route::get('/medicionesBasura', [\App\Http\Controllers\BasuraController::class, 'medicionesBasura'])->name('medicion_basura');
Route::group([
            'middleware' => IsAdmin::class], function() {

            Route::get('/assign-locations', [UserLocationController::class, 'index'])->name('assign.locations');
            Route::post('/assign-locations', [UserLocationController::class, 'store'])->name('assign.locations.store');
                Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

                Route::get('/admin',[PagesController::class,'admin'])->name('admin');
                Route::get('/team', [\App\Http\Controllers\TeamController::class, 'index'])->name('team');
                Route::put('/team', [\App\Http\Controllers\TeamController::class, 'updateMember'])->name('updateMember');
                
                Route::get('/team/{id}', [\App\Http\Controllers\TeamController::class, 'editMember'])->name('editMember');
                Route::get('/addmember', [\App\Http\Controllers\TeamController::class, 'addMember'])->name('addMember');
                Route::get('/uploadImage',[\App\Http\Controllers\PortraitController::class, 'show'])->name('uploadImage');
                Route::post('/uploadIsmage',[\App\Http\Controllers\PortraitController::class, 'store'])->name('storePortrait');
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
                Route::put('/update', [\App\Http\Controllers\LogoController::class, 'update'])->name('updateLogo');



                //post routes
                Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
                Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('createPost');
                Route::delete('/posts', [\App\Http\Controllers\PostController::class, 'destroy'])->name('deletePost');

                Route::get('/newpost', [\App\Http\Controllers\PostController::class, 'create'])->name('newPost');
                Route::get('/editposts/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('editPost');
                Route::put('/editpost', [\App\Http\Controllers\PostController::class, 'update'])->name('updatePost');
                //about controller
                Route::get('/editAbout', [\App\Http\Controllers\AboutController::class, 'show'])->name('showAbout');
                Route::post('/storeAbout', [\App\Http\Controllers\AboutController::class, 'store'])->name('storeAbout');
                //articles
                Route::get('/articles', [\App\Http\Controllers\ArticlesController::class, 'index'])->name('showArticles');
                Route::get('/editArticle/{id}', [\App\Http\Controllers\ArticlesController::class, 'edit'])->name('editArticle');

                Route::get('/addArticle', [\App\Http\Controllers\ArticlesController::class, 'create'])->name('addArticle');
                Route::post('/addArticle', [\App\Http\Controllers\ArticlesController::class, 'store'])->name('storeArticle');
                Route::delete('/article', [\App\Http\Controllers\ArticlesController::class, 'destroy'])->name('deleteArticle');
                Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('usersIndex');
                Route::get('/storeUser', [\App\Http\Controllers\UserController::class, 'storeUser'])->name('storeUser');

                Route::get('/authUser/{id}', [\App\Http\Controllers\UserController::class, 'authUser'])->name('authUser');

                //configuration
                Route::get('/config', [\App\Http\Controllers\ConfigurationController::class, 'index'])->name('config');
                Route::post('/config', [\App\Http\Controllers\ConfigurationController::class, 'update'])->name('setConfig');

                //asambleas 
                Route::get('/asambleas', [\App\Http\Controllers\AsambleaController::class, 'index'])->name('asambleas');
                Route::get('/addAsamblea', [\App\Http\Controllers\AsambleaController::class, 'create'])->name('addAsamblea');
                Route::post('/asamblea', [\App\Http\Controllers\AsambleaController::class, 'store'])->name('storeAsamblea');
                Route::get('/editAsamblea/{id}', [\App\Http\Controllers\AsambleaController::class, 'edit'])->name('editAsamblea');
                Route::put('/updateAsamblea', [\App\Http\Controllers\AsambleaController::class, 'update'])->name('updateAsamblea');

                Route::delete('/asamblea', [\App\Http\Controllers\AsambleaController::class, 'destroy'])->name('deleteAsamblea');

                //imagenes asamblea
                Route::get('/showImagenAsamblea/{id}', [\App\Http\Controllers\ImagenAsambleaController::class, 'index'])->name('showImagenAsamblea');
                Route::get('/createImagenAsamblea/{id}', [\App\Http\Controllers\ImagenAsambleaController::class, 'create'])->name('createImagenAsamblea');
                Route::post('/storeImagenAsamblea', [\App\Http\Controllers\ImagenAsambleaController::class, 'store'])->name('storeImagenAsamblea');
                Route::delete('/deleteImagenAsamblea', [\App\Http\Controllers\ImagenAsambleaController::class, 'destroy'])->name('deleteImagenAsamblea');

                //links
                Route::get('/links', [\App\Http\Controllers\LinkController::class, 'index'])->name('links');
                Route::get('/addLink', [\App\Http\Controllers\LinkController::class, 'create'])->name('addLink');
                Route::post('/addLink', [\App\Http\Controllers\LinkController::class, 'store'])->name('storeLink');
                Route::post('/updateLink', [\App\Http\Controllers\LinkController::class, 'update'])->name('updateLink');

                Route::get('/links/{id}', [\App\Http\Controllers\LinkController::class, 'edit'])->name('editLink');
                Route::delete('/link', [\App\Http\Controllers\LinkController::class, 'destroy'])->name('deleteLink');

                //Estaciones 
                Route::get('/verestaciones', [\App\Http\Controllers\StationController::class, 'index'])->name('stations');
                Route::get('/editStation/{id}', [\App\Http\Controllers\StationController::class, 'edit'])->name('editStation');
                Route::get('/crearEstacion', [\App\Http\Controllers\StationController::class, 'create'])->name('addStation');
                Route::post('/crearEstacion', [\App\Http\Controllers\StationController::class, 'store'])->name('storeStation');
                Route::delete('/estacion', [\App\Http\Controllers\StationController::class, 'destroy'])->name('deletestation');
                Route::put('/updatestation', [\App\Http\Controllers\StationController::class, 'update'])->name('updateStation');

                //Registros de estaciones

                Route::get('/registroEstacion/{mac}', [\App\Http\Controllers\StationRegisterController::class, 'show'])->name('showRegistersStation');
                Route::post('/downloadReport', [\App\Http\Controllers\StationRegisterController::class, 'generateReport'])->name('reportRegistersStation');
                Route::post('/downloadAllReport', [\App\Http\Controllers\StationRegisterController::class, 'generateAllReports'])->name('generateAllReports');
                Route::post('/uploadReport', [\App\Http\Controllers\StationRegisterReportController::class, 'store'])->name('uploadReportPdf');

                //Report Routes

                Route::get('/reportes/{id}', [\App\Http\Controllers\StationRegisterReportController::class, 'show'])->name('uploadReport');
                

                //User Routes
                Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');

                });

Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('showPost');
Route::get('/estacion/{id}', [\App\Http\Controllers\StationController::class, 'show'])->name('showStation');
Route::get('/asamblea/{id}', [\App\Http\Controllers\AsambleaController::class, 'show'])->name('showAsamblea');
Route::get('/archivos', [\App\Http\Controllers\ArticlesController::class, 'show'])->name('showArchivos');
Route::get('/tutoriales', [\App\Http\Controllers\LinkController::class, 'tutorials'])->name('showTutoriales');
Route::get('/linksdeinteres', [\App\Http\Controllers\LinkController::class, 'links'])->name('showLinks');

Route::get('/noticias', [\App\Http\Controllers\PostController::class, 'noticias'])->name('showNoticias');
Route::get('/estaciones', [\App\Http\Controllers\StationController::class, 'showStations'])->name('estaciones');
Route::post('/searchEstacion', [\App\Http\Controllers\StationController::class, 'searchStations'])->name('searchStations');
