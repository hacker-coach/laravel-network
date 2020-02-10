<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Information;

class InformationController extends BasePrivatController
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
            'message' => 'string|max:1500|nullable',
            'ps' => 'string|max:1500|nullable'
        ]);
    }
    /**
     * SET the specified resource in model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     */
    protected function setRequestToModel(Request $request,Information $information)
    {
            $information->show_message = (boolean)$request->input('show_message');
            $information->message = $request->input('message');
            $information->ps = $request->input('ps');
            $information->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::where('user_id',Auth::user()->getAuthIdentifier())->get();
        return view('model.information.index', [
            'informations' => $informations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $information = new Information();
        return view('model.information.create', [
            'information' => $information
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
        $information = new Information();
        $information = $information->create();

        if(!is_null($information)){
            $information->user_id = Auth::user()->getAuthIdentifier();
            $this->setRequestToModel($request,$information);
        }

        return redirect()->route('informationShow', $information->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = Information::where('id',$id)->get()->first();
        return view('model.information.show', [
            'information' => $information
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
        $information = Information::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.information.edit', [
            'information' => $information
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
        $information = Information::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();

        if(!is_null($information)){
            $this->setRequestToModel($request,$information);
        }
        return redirect()->route('informationShow', $information->id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $information = Information::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.information.delete', [
            'information' => $information
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
        $information = Information::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        $information->delete();
        return redirect()->route('informationIndex');
    }
}
