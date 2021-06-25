<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Fortify;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your \Application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('git-pull-it', function () {
    return shell_exec('git pull origin new-frontend-main');
});
Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::registerView(function () {
    return view('auth.register');
});
Fortify::requestPasswordResetLinkView(function () {
    return view('auth.forgot-password');
});
Fortify::resetPasswordView(function ($request) {
    return view('auth.reset-password', ['request' => $request]);
});
// Fortify::verifyEmailView(function () {
//     return view('auth.verify-email');
// });


Route::get('/', \App\Http\Main\Index::class)->name('index');
Route::get('/about', \App\Http\Main\About::class)->name('about');


//Projects


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', \App\Http\User\Dashboard::class)->name('dashboard');
    Route::get('/admin/dashboard', \App\Http\Admin\Dashboard::class)->name('admin-dashboard');
    Route::get('/admin/users/{id}', \App\Http\Admin\Profile::class)->name('admin-dashboard');
    Route::get('/profile', \App\Http\User\Profile::class)->name('profile');
    Route::get('/profile/edit', \App\Http\User\ProfileEdit::class)->name('profile.edit');
 });

 if (App::environment('production')) {
    URL::forceScheme('https');
}