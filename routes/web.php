<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//Naming Conventions 
//common Resource Routes:
// index - Show all listings
// show - Show a single Listing
// create- Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing 
// update - update listing
// destroy - delete listing

//All listing
Route::get('/',[ListingController::class, 'index']);


//Show create Form
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

//Store Listings data
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

//show edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//Edit submit to update
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');
//show manage listing page
Route::get('/listing/manage',[ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class,'show']);


//Show Register Create Form
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class, 'store']);

//log user out 
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class, 'authenticate']);



// Route::get('/hello', function() {
//     return response('<h1>Hello World</h1>', 200)
//     ->header('content-Type', 'text/plain')
//     ->header('foo','bar');
// });

// Route::get('/post/{id}', function($id){
//     return response('Post '.$id);
// })->where('id','[0-9]+');

// Route::get('/search', function(Request $request){
//     return($request->name .''.$request->city);
// });