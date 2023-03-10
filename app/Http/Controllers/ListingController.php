<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //get and show all listing
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            // 'heading'=>'Latest Listing',  //not needed
            'listings' =>Listing::latest()->filter(request(['tag','search']))->paginate(5)
        ]);
    }

    //get and show single Listing 
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    //show create from
    public function create(){
        return view('listings.create');
    }

     //show create from
     public function store(Request $request){
        $formFields= $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=> 'required',
            'website'=>'required',
            'email' => ['required', 'email'],
            'tags'=>'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] =$request->file('logo')->store('logos','public');
        }

        $formFields['user_id']=auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message','Listing created successfully!');
    }
    //show edit form
    public function edit(Listing $listing){
        return view('listings.edit',['listing'=>$listing]);
    }

    //Update listing
    public function update(Request $request, Listing $listing){

        //make sure logged user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorize action');
        }
        $formFields= $request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=> 'required',
            'website'=>'required',
            'email' => ['required', 'email'],
            'tags'=>'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] =$request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);

        return back()->with('message','Listing created successfully!');
    }

    //delete Listing
    public function destroy(Listing $listing){
        //make sure logged user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorize action');
        }
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted successfully!');
    }
    //manage listing
    public function manage(){
        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
    }
}
