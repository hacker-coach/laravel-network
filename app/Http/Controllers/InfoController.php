<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Info;

class InfoController extends BasePrivatController
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
     * @param  \App\Info  $info
     */
    protected function setRequestToModel(Request $request, Info $info)
    {
            $info->show_message = (boolean)$request->input('show_message');
            $info->message = $request->input('message');
            $info->ps = $request->input('ps');
            $info->save();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  integer  $contact_id
     * @return \Illuminate\Http\Response
     */
    public function create($contact_id)
    {
        $info = new Info();
        return view('model.info.create', [
            'info' => $info,
            'contact_id' => $contact_id
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
        $info = new Info();
        $info = $info->create();

        if(!is_null($info)){
            $info->user_id = Auth::user()->getAuthIdentifier();
            $info->contact_id = (integer)$request->input('contact_id');
            $this->setRequestToModel($request,$info);
        }

        return redirect()->route('contactShow', (integer)$request->input('contact_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::where('id',$id)->get()->first();
        return view('model.info.show', [
            'info' => $info
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  integer  $contact_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$contact_id)
    {
        $info = Info::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.info.edit', [
            'info' => $info,
            'contact_id' => $contact_id
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
        $info = Info::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();

        if(!is_null($info)){
            $this->setRequestToModel($request,$info);
        }
        return redirect()->route('contactShow', (integer)$request->input('contact_id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $info = Info::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.info.delete', [
            'info' => $info
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
        $info = Info::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        $info->delete();
        return redirect()->route('infoIndex');
    }
}
