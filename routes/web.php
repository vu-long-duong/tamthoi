<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Members\LoginController;
use App\Http\Controllers\Members\SignupController;
use App\Http\Controllers\Members\UserProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Members\FilmController;
use App\Http\Controllers\Admin\FilmADController;
use App\Http\Controllers\Admin\FilmCategoryADController;
use App\Http\Controllers\Admin\FilmCountriesController;
use App\Http\Controllers\Admin\FilmGenreController;
use App\Http\Controllers\Members\BlogController;
use App\Http\Controllers\Members\HomeController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\Members\SearchController;
use App\Http\Controllers\Members\ResetPasswordController;
use App\Http\Controllers\Members\MyAccountController;
use App\Http\Controllers\Admin\FilmYearController;
use App\Http\Controllers\Admin\RoleController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/signup', [SignupController::class, 'getsignup'])->name('user.signup');

Route::post('/signup/user', [SignupController::class, 'signup'])->name('user.store');

Route::get('/login', [LoginController::class, 'login'])->name('user.login');

Route::get('/login/user', [LoginController::class, 'loginaccount'])->name('user.login-account');

Route::get('/resetpassword', [ResetPasswordController::class, 'getresetpassword'])->name('user.show-resetpassword');

Route::get('/reset', [ResetPasswordController::class, 'resetpassword'])->name('user.resetpassword');

Route::get('/newpassword', [ResetPasswordController::class, 'getnewpassword'])->name('user.show-newpassword');

Route::post('/newpassword/{id}', [ResetPasswordController::class, 'newpassword'])->name('user.newpassword');

Route::get('/inputpassword', [ResetPasswordController::class, 'getinputpassword'])->name('user.inputpassword');
Route::get('/inputpassword2', [ResetPasswordController::class, 'getinputpassword2'])->name('user.inputpassword2');
Route::get('/createpassword2', [ResetPasswordController::class, 'createpassword2'])->name('user.createpassword');
Route::post('/resetpassword/old', [ResetPasswordController::class, 'resetpasswordold'])->name('user.resetpasswordold');

Route::get('/checkpass2', [LoginController::class, 'getcheckpass2'])->name('user.show-checkpassword2');
Route::get('/checkpassword2', [LoginController::class, 'checkpass2'])->name('user.checkpassword2');


Route::get('/create', [LoginController::class], 'create')->name('user.create');

Route::get('/user/verify/{token}', [LoginController::class, 'verify'])->name('user.verify');


Route::get('/myaccount/{id}', [MyAccountController::class, 'index'])->name('user.myaccount');

Route::get('/userprofile/{id}', [UserProfileController::class, 'index'])->name('user.index');
Route::post('/userprofile/update/{id}', [UserProfileController::class, 'update'])->name('user.update');

Route::get('/add-addprice/{id}', [UserProfileController::class, 'getaddprice'])->name('user.update-addprice');
Route::post('/add-addprice/{id}', [UserProfileController::class, 'MoneyIntoYourAccount'])->name('user.add-addprice');

Route::get('/add-bank/{id}', [UserProfileController::class, 'getbank'])->name('user.create-bank');
Route::post('/store-bank/{id}', [UserProfileController::class, 'storebank'])->name('user.store-bank');

Route::get('/update-bank/{id}', [UserProfileController::class, 'updatebank'])->name('user.update-bank');
Route::post('/edit-bank/{id}', [UserProfileController::class, 'editbank'])->name('user.edit-bank');
Route::get('/search', [SearchController::class, 'search'])->name('admin.search');
Route::get('/searchdetail', [SearchController::class, 'searchdetail'])->name('admin.searchdetail');

Route::get('/importexcel', [ImportExcelController::class, 'createexcel'])->name('admin.importexcel-create');
Route::get('/importexcel/store', [ImportExcelController::class, 'storeexcel'])->name('admin.importexcel-store');

Route::get('/post/create', [BlogController::class, 'createpost'])->name('page.create-post');
Route::post('/post/store', [BlogController::class, 'storepost'])->name('page.store-post');
Route::get('/postshow', [BlogController::class, 'showpost'])->name('page.post-show');
Route::get('/postsingershow/{id}', [BlogController::class, 'showpostsinger'])->name('page.postsinger-show');




Route::get('film/detail/{id}', [FilmController::class, 'show'])->name('page.film-detail-show');

Route::post('film/detail/evalue/{id}', [FilmController::class, 'evalue'])->name('page.film-evalue');

Route::get('film/watch/{id}', [FilmController::class, 'watch'])->name('page.film-watch');
Route::get('film/uprank/', [FilmController::class, 'showuprank'])->name('page.show-uprank');

Route::get('/home', [HomeController::class, 'home'])->name('user.home');
Route::get('/home/filmcategory/{id}', [HomeController::class, 'showfilmcategory'])->name('user.home-category');
Route::get('/home/filmgenre/{id}', [HomeController::class, 'showfilmgenre'])->name('user.home-genre');
Route::get('/home/filmcountrie/{id}', [HomeController::class, 'showfilmcountrie'])->name('user.home-countrie');
Route::get('/home/filmyear/{id}', [HomeController::class, 'showfilmyear'])->name('user.home-year');




Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('checklogin');
Route::get('/searchAD', [AdminController::class, 'findAll'])->name('admin.search-ad');


Route::get('/profile', [ProfileController::class, 'show'])->name('admin.profile');

Route::get('/film/ad/detail', [FilmADController::class, 'showfilm'])->name('admin.show-film-detail');
Route::get('/film/ad/detail/create', [FilmADController::class, 'getfilm'])->name('admin.create-film-detail');
Route::post('/film/ad/detail/store', [FilmADController::class, 'storefilm'])->name('admin.store-film-detail');

Route::get('/create-role', [RoleController::class, 'getRole'])->name('admin.create-role-account');
Route::get('/show-role', [RoleController::class, 'show'])->name('admin.show-role-account');
Route::get('/admin-role/{id}', [RoleController::class, 'grantpermissionsadmin'])->name('admin.edit-admin-role-account');
Route::get('/user-role/{id}', [RoleController::class, 'showpermissionuser'])->name('admin.update-user-role-account');
Route::post('/user-role-permisson/{id}', [RoleController::class, 'grantpermissionuser'])->name('admin.edit-user-role-account');


Route::get('/film/create-genre', [FilmGenreController::class, 'getfilmgenre'])->name('admin.create-film-genre');
Route::post('/film/store-genre', [FilmGenreController::class, 'store'])->name('admin.store-film-genre');
Route::get('/film/update-genre', [FilmGenreController::class, 'update'])->name('admin.update-film-genre');
Route::post('/film/edit-genre/{id}', [FilmGenreController::class, 'edit'])->name('admin.edit-film-genre');
Route::get('/film/show-genre', [FilmGenreController::class, 'show'])->name('admin.show-film-genre');


Route::get('/film/create-category', [FilmCategoryADController::class, 'getfilmcategory'])->name('admin.create-film-category');
Route::post('/film/store-category', [FilmCategoryADController::class, 'store'])->name('admin.store-film-category');
Route::get('/film/update-category', [FilmCategoryADController::class, 'update'])->name('admin.update-film-category');
Route::post('/film/edit-category/{id}', [FilmCategoryADController::class, 'edit'])->name('admin.edit-film-category');
Route::get('/film/show-category', [FilmCategoryADController::class, 'show'])->name('admin.show-film-category');


Route::get('/film/create-year', [FilmYearController::class, 'getfilmyear'])->name('admin.create-film-year');
Route::post('/film/store-year', [FilmYearController::class, 'store'])->name('admin.store-film-year');
Route::get('/film/update-year', [FilmYearController::class, 'update'])->name('admin.update-film-year');
Route::post('/film/edit-year/{id}', [FilmYearController::class, 'edit'])->name('admin.edit-film-year');
Route::get('/film/show-year', [FilmYearController::class, 'show'])->name('admin.show-film-year');




Route::get('/film/create-countrie', [FilmCountriesController::class, 'getfilmcountrie'])->name('admin.create-film-countrie');
Route::post('/film/store-countrie', [FilmCountriesController::class, 'store'])->name('admin.store-film-countrie');
Route::get('/film/show-countrie', [FilmCountriesController::class, 'show'])->name('admin.show-film-countrie');
Route::get('/film/update-countrie', [FilmCountriesController::class, 'update'])->name('admin.update-film-countrie');
Route::post('/film/edit-countrie/{id}', [FilmCountriesController::class, 'edit'])->name('admin.edit-film-countrie');




Route::get('/login-google', [LoginController::class, 'logingoogle'])->name('login-google');
Route::any('/callback/google', [LoginController::class, 'callbackgoogle']);


Route::get('/login-facebook', [LoginController::class, 'loginfacebook'])->name('login-facebook');
Route::any('/callback/facebook', [LoginController::class, 'callbackfacebook']);
