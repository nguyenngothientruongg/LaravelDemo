<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('index', [CustomAuthController::class, 'pagination'])->name('auth.pagination');
Route::put('/auth/{id}', [CustomAuthController::class, 'updateUser'])->name('auth.updateUser');
Route::get('/auth/{id}/editUser', [CustomAuthController::class, 'editUser'])->name('auth.editUser');
Route::delete('/auth/{id}', [CustomAuthController::class, 'deleteUser'])->name('auth.deleteUser');
Route::get('/auth/{id}', [CustomAuthController::class, 'showDetailUser'])->name('auth.detailUser');
// Route::get('index', [CustomAuthController::class, 'getListUser'])->name('index');
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');