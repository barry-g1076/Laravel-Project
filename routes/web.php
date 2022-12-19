<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
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

//All listing
Route::get('/',[ListingController::class, 'index']);

//Single Listing
Route::get('/listings/{listing}', [ListingController::class,'show']);


//Naming Conventions 
//common Resource Routes:
// index - Show all listings
// show - Show a single Lisitng
// create- Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing 
// update - update listing
// destroy - delete listing


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