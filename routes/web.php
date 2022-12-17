<?php

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
Route::get('/', function () {
    return view('listings', [
        'heading'=>'Latest Listing',
        'listings' =>Listing::all()
    ]);
});

//Single Listing
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing',[
        'listing' => $listing
    ]);
});

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