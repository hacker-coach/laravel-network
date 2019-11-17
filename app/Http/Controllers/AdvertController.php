<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Advert;

class AdvertController extends BasePrivatController
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:1024',
            'teaser' => 'string|max:1500|nullable',
            'title' => 'string|max:1500|nullable',
            'text' => 'string|max:1500|nullable',
            'link' => 'string|max:1500|nullable',
        ]);
    }
    /**
     * SET the specified resource in model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advert  $advert
     */
    protected function setRequestToModel(Request $request,Advert $advert)
    {
        $advert->show_advert = (boolean)$request->input('show_advert');
        $advert->show_advert_on_www = (boolean)$request->input('show_advert_on_www');
        $advert->title = $request->input('title');
        $advert->teaser = $request->input('teaser');
        $advert->text = $request->input('text');
        $advert->link = $request->input('link');
        $this->upload($advert,$request,'uploads-advert','image');
        $advert->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::where('user_id',Auth::user()->getAuthIdentifier())->get();
        return view('model.advert.index', [
            'adverts' => $adverts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advert = new Advert();
        return view('model.advert.create', [
            'advert' => $advert
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advert = new Advert();
        $advert = $advert->create();

        if(!is_null($advert)){
            $advert->user_id = Auth::user()->getAuthIdentifier();
            $this->setRequestToModel($request,$advert);
        }


        return redirect()->route('advertShow', $advert->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advert::where('id',$id)->get()->first();
        return view('model.advert.show', [
            'advert' => $advert,
            'user' => $advert->user,
            'isList' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.advert.edit', [
            'advert' => $advert
        ]);
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
        $advert = Advert::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();

        if(!is_null($advert)){
            $this->setRequestToModel($request,$advert);
        }
        return redirect()->route('advertShow', $advert->id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $advert = Advert::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.advert.delete', [
            'advert' => $advert
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advert::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        $advert->delete();
        return redirect()->route('advertIndex');
    }
}
