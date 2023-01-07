<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Rmbr_search;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::where('approved','1')->latest()->filter(request(['tags', 'search_input']))->paginate(10);
        //dd($listings);

     
        return view('index', ['listings'=> $listings]);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adding_ad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'manuf_year' => 'required',
            'kilometers' => 'required',
            'price' => 'required',
            'drive_type' => 'required',
            'shifter_type' => 'required',
            'state' => 'required',
            'fuel_type' => 'required',
            'horse_power' => 'required',
            'motor_cc' => 'required',
            'no_doors' => 'required',
            'imgpath' => 'required|image',
        ]);
        // if($request->hasFile('logo')){
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }
        
        //dd( auth()->id());
        
        $image = $request->file('imgpath');
        $image->move(public_path().'/storage/uploads/', $img = 'img_'.Str::random(15).'.jpg');

        // Ovo ne radi i ne znam da namestim
        // $image = Image::make(public_path("storage/{$imagePath}"));
        // $image->save();

        $formFields['user_id'] = auth()->id();
        $formFields['imgpath'] = $img;
        

        Listing::create($formFields);

        return redirect("/profile");//->with('message', 'Listing created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listing::whereId($id)->delete();
        return back();
        //Listing::whereId(auth()->user()->id)->delete();
        //return redirect('/');
    }
    

    public function my_listings(){

        //dd(auth()->user()->listings()->get());
        return view('profile', ['listings' => auth()->user()->listings()->get()]);

    }

    public function admin_listings(){
        return view('admin_index', ['listings' => Listing::where('approved', '1')->latest()->filter(request(['tags', 'search_input']))->paginate(10)]);
    }


    public function listings_on_hold(){
        return view('admin_on_hold', ['listings' => Listing::where('approved', '0')->latest()->filter(request(['tags', 'search_input']))->paginate(10)]);
    }

    public function approve($id){
        //dd(Listing::whereId($id));
        Listing::whereId($id)->update(['approved' => '1']);
        return back();
    }

    public function singlead($id) {
        //Ovo moze mnogo lepse sigurno
        $listing = Listing::whereId($id)->get();
        $user = User::whereId($listing[0]->user_id)->get();
        $other_listings = Listing::where('user_id', $listing[0]->user_id)->get();
        return view('single_ad', compact('listing', 'user', 'other_listings'));
    }

}
