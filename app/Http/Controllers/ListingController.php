<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //get and sshow all listing
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            // 'heading'=>'Latest Listing',  //not needed
            'listings' =>Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }

    //get ans show single Listing 
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
}
