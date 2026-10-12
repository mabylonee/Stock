<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InController;
use App\Http\Controllers\OutController;
use App\Http\Controllers\CurController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\bonController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MailSend;
use App\Http\Controllers\ExportExcelController;







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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[MainController::class, 'login'])->name('auth.login');
// Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');

Route::get('/send-mail', [MainController::class, 'mailsend']);
Route::get('/export_excel', [ExportExcelController::class, 'index']);
Route::get('/export_excel/excel', [ExportExcelController::class, 'excel'])->name('export_excel.excel');

// Route::get('/index', function () {
//     return view('index');
// });
// Route::get('/listeIn', function () {
//     return view('listeIn');
// });


//Route::get("/stock_out",[OutController::class,'store']);



//Route::get("/bon",[bonController::class,'bons']);
//Route::get("/form-bon",[bonController::class,'bons']);
//Route::get('/bon', [bonController::class, 'generatepdf'])->name('bon.pdf');



//Route::get('/bon', [bonController::class, 'bon'])->name('bon.pdf');
//Route::get('/listeBon', [bonController::class, 'listeBon']);

//Route::get("/bon/{app}",[bonController::class,'generatepdf'])->name('bon.pdf');

Route::get('/download', [bonController::class, 'download']);

Route::get('/download/{file}', [bonController::class, 'download']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', [CustomAuthController::class, 'home']); 
// //Route::get("listeOut",[CustomAuthController::class,'dashboard']);
// Route::get("listeCur",[CustomAuthController::class,'listeCur']);
// Route::get('log', [CustomAuthController::class, 'index'])->name('log');
// Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin'); 
// Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
// Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup'); 
// Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


//Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');

//Route::get('index', [CurController::class, 'dernierAjout']); 



Route::group(['middleware'=>['AuthCheck']], function(){

    Route::get('/admin/dashboard',[MainController::class, 'dashboard']);


    Route::get('/auth/log',[MainController::class, 'login'])->name('auth.log');
    Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');
    Route::get('/index',[CurController::class, 'dernierAjout']);

    /////////////CUR
    Route::post("/stock_cur",[CurController::class,'store']);
    Route::get("/stock_cur",[CurController::class,'stock_cur']);

    Route::get("listeCur",[CurController::class,'Cur']);
    Route::get('listeCur/{app}',[CurController::class,'delete']);
    Route::get('modCur/{idStock}',[CurController::class,'edite']);
    Route::post('updateCur/{idStock}',[CurController::class,'updateCur']);

    ///////////OUT
    Route::get("listeOut",[OutController::class,'Out']);
    Route::get("/stock_out",[OutController::class,'InterOut']);
    Route::post("/stock_out",[OutController::class,'store']);
    //////////IN
    Route::get("listeIn",[InController::class,'In']);
    Route::get("/stock_in",[InController::class,'InterIn']);
    Route::post("/stock_in",[InController::class,'store']);
    /////////BON
    Route::get('/form-bon', [bonController::class, 'bons']);
    Route::post("/form-bon",[bonController::class,'store'])->name('bon.pdf');
    Route::get('listeBon', [bonController::class, 'show']);
    //////////////USER
    Route::get("/user",[MainController::class,'register'])->name('auth.user');
    Route::post('/user',[MainController::class, 'save'])->name('auth.save');
    Route::get('listeUser', [MainController::class, 'show']);
    Route::get('listeUser/{app}',[MainController::class,'delete']);
    Route::get('modPassword/{id}',[MainController::class,'edite']);
    Route::post('updatePassword/{id}',[MainController::class,'updatePassword']);


///////////////IMPRESSION
Route::get("/impression",[CurController::class,'printPreview']);
Route::get("/impressionOut/{app}",[OutController::class,'printPreviewOut']);
Route::get("/bon/{app}",[bonController::class,'printPreview']);
/////////////PROFILE
//Route::get("/profil",[ProfilController::class,'profil']);
Route::get("/profil",[ProfilController::class,'afficheProfile']);
Route::get("/profil/{id}",[ProfilController::class,'profiledetails']);
Route::get('/profil/{id}',[ProfilController::class,'edite']);
Route::post('/update/{id}',[ProfilController::class,'update']);
Route::get('/profile/{id}',[ProfilController::class,'editepassword']);
Route::post('/updatepassword/{id}',[ProfilController::class,'updatepassword']);

//////////////MENU
//Route::get("menu",[InController::class,'menu']);






    // Route::get('/admin/dashboard',[MainController::class, 'dashboard']);
    // Route::get('/admin/settings',[MainController::class,'settings']);
    // Route::get('/admin/profile',[MainController::class,'profile']);
    // Route::get('/admin/staff',[MainController::class,'staff']);
});
