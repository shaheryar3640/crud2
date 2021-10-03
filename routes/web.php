<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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
//      return view('front.index');

// });

Route::get('/',[PagesController::class,'index'])->name('front.blogs.index');
Route::get('/blogs/{id}',[PagesController::class,'detail'])->name('front.blogs.detail');

Auth::routes(['register' => false]);

Route::name('admin.')->middleware('auth')->group(function () {
    // Route::name('blogs.')->group(function () {
        // Route::get('/blogs', [BlogController::class, 'index']);
        // // create from for blog route
        // Route::get('/blogs/create', [BlogController::class, 'create'])->name('create');
        // // sorte blog route
        // Route::post('/blogs/store', [BlogController::class, 'store'])->name('store');

        // // edit blog form route
        // Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('edit');

        // // update blog route
        // Route::patch('/blogs/{id}', [BlogController::class, 'update'])->name('update');

        // // delete blog route
        // Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('destroy');
    // });
    Route::get('/home', function(){
        return redirect(route('admin.blogs.index'));
    });
    Route::resource('/blogs', BlogController::class)->except('show');
});
