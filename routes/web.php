<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

Route::get('/', function () {
    return view('welcome');
})->name('Welcome.page');

Route::get('/blog', [BlogsController::class, 'index'])->name('all.blogs');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
 

Route::post('/blog/save', [BlogsController::class, 'Save'])->name('blogdata.save');
Route::get('/blog/delete/{id}', [BlogsController::class, 'Delete'])->name('blog.delete');


 Route::get('/adminhome',[AdminController::class,'index'])->middleware('isadmin');
 Route::get('/home',[UserController::class,'index'])->middleware('isuser');
 Route::post('/blog/update-status', [BlogsController::class, 'updateStatus'])->name('blog.updateStatus');

 Route::post('/blog/update', [BlogsController::class, 'update'])->name('blog.update');
 Route::post('/blog/updateadmin', [HomeController::class, 'update'])->name('blog.updateadmin');


//  Route::get('/dashboard',[HomeController::class,'index']);