<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{RoleController,HomeController,CategoryController,subcategoryController};


 
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

Auth::routes(); 

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/hello', function(){
//     $team = ['sunny','ariful','noyon','mahedi'];
//     return view('hello', compact('team'));
// });
 

// all user role routes starts 
Route::get('/role', [RoleController::class, 'addform']);
Route::post('/role/add', [RoleController::class, 'storerole']);
// all user role routes Ends



// all user Category routes starts
Route::prefix('category')->group(function(){
 Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
 Route::post('/store',[CategoryController::class,'store']);
 Route::get('/index',[CategoryController::class,'index'])->name('category.index');
 Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
 Route::get('/trashed',[CategoryController::class,'deletedCategory'])->name('category.trashed');
 Route::get('/restore/{id}',[CategoryController::class,'categoryrestore'])->name('category.restore'); 
 Route::get('/vanish/{id}',[CategoryController::class,'vanish'])->name('category.force'); 
 Route::get('/edit/{id}',[CategoryController::class,'edit']); 
 Route::post('/update',[CategoryController::class,'update'])->name('category.update'); 
 // all user Category routes Ends
});


// all subcategory starts
Route::prefix('subcategory')->group(function(){
    Route::get('/create',[subcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/store',[subcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/index',[subcategoryController::class, 'index'])->name('subcategory.index');
});


// all subcategory ends


 Route::get('/user/dashboard',function(){
     return "your dashboard pore";
 });






