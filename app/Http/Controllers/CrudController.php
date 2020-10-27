<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getOffers(){

       return Offer::get();

    }

   /* public function store(){

        Offer::create([
            'name' => 'offer5',
            'price'=> '4000',
            'photo'=> 'oooopp.pug',
        ]);
    }*/

    public function create(){
        return view('offers.createOffers');
    }


    public function store(Request $request){

        //validate data before insert in database

        $rules = $this->getRules();
        $messages = $this->getMessages();

        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator ->fails()){
           return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        //insert
        Offer::create([
            'name' => $request->name,
            'photo' => $request->photo,
            'price' => $request->price,
        ]);
        return redirect()->back()->with(['success' => 'تم تسجيل العرض']);


    }

    protected function getMessages(){

        return $messages = [
            'name.required' =>__('masseg.offer name required'),
            'name.max' => 'max 100 car',
            'name.unique' => 'this unique',
            'price.required' => 'enter price',
            'price.numeric' => 'enter numbers only',
            'photo.required' => 'enter photo',
        ];
    }

    protected function getRules(){

        return $rules = [

            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'photo' => 'required',
        ];

    }


}
