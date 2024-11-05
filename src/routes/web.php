<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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


Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contacts/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
