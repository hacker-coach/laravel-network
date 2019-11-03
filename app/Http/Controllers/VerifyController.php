<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verify;

use Illuminate\Support\Facades\Auth;

class VerifyController extends BasePrivatController
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
            'message_check_of_super_ps' => 'string|max:1500|nullable',
            'text' => 'string|max:1500|nullable',
            'answer_of_user' => 'string|max:1500|nullable',
        ]);
    }
    /**
     * SET the specified resource in model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verify  $verify
     */
    protected function setRequestToModel(Request $request,Verify $verify)
    {
        $verify->show_verify = (boolean)$request->input('show_verify');
        $verify->show_know = (boolean)$request->input('show_know');
        $verify->show_has = (boolean)$request->input('show_has');
        $verify->show_message = (boolean)$request->input('show_message');
        $verify->show_answer = (boolean)$request->input('show_answer');

        $verify->check_of_super_ps = (boolean)$request->input('check_of_super_ps');
        $verify->message_check_of_super_ps = $request->input('message_check_of_super_ps');

        $verify->text = $request->input('text');
        $verify->answer_of_user = $request->input('answer_of_user');

        $verify->contact_real_friend_or_online = (boolean)$request->input('contact_real_friend_or_online');

        $verify->know_from_mensa = (boolean)$request->input('know_from_mensa');
        $verify->know_from_tns = (boolean)$request->input('know_from_tns');
        $verify->know_from_mhn = (boolean)$request->input('know_from_mhn');
        $verify->know_from_cbc = (boolean)$request->input('know_from_cbc');
        $verify->know_from_iq_club = (boolean)$request->input('know_from_iq_club');

        $verify->has_super_special_talent = (boolean)$request->input('has_super_special_talent');

        $verify->has_extrem_iq = (boolean)$request->input('has_extrem_iq');
        $verify->has_super_extrem_iq = (boolean)$request->input('has_super_extrem_iq');

        $verify->has_extrem_creative = (boolean)$request->input('has_extrem_creative');
        $verify->has_super_extrem_creative = (boolean)$request->input('has_super_extrem_creative');

        $verify->has_extrem_thinker = (boolean)$request->input('has_extrem_thinker');
        $verify->has_super_extrem_thinker = (boolean)$request->input('has_super_extrem_thinker');

        $verify->has_extrem_language = (boolean)$request->input('has_extrem_language');
        $verify->has_super_extrem_language = (boolean)$request->input('has_super_extrem_language');

        $verify->has_extrem_eq = (boolean)$request->input('has_extrem_eq');
        $verify->has_super_extrem_eq = (boolean)$request->input('has_super_extrem_eq');

        $verify->has_extrem_speaker = (boolean)$request->input('has_extrem_speaker');
        $verify->has_super_extrem_speaker = (boolean)$request->input('has_super_extrem_speaker');

        $verify->has_extrem_writer = (boolean)$request->input('has_extrem_writer');
        $verify->has_super_extrem_writer = (boolean)$request->input('has_super_extrem_writer');

        $verify->has_extrem_logic = (boolean)$request->input('has_extrem_logic');
        $verify->has_super_extrem_logic = (boolean)$request->input('has_super_extrem_logic');

        $verify->has_extrem_imagine = (boolean)$request->input('has_extrem_imagine');
        $verify->has_super_extrem_imagine = (boolean)$request->input('has_super_extrem_imagine');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $user_id
     * @return \Illuminate\Http\Response
     */
    public function createedit($user_id)
    {
        $verify = Verify::where('user_id', (int)$user_id)
            ->where('user_id_from',  Auth::user()->getAuthIdentifier())
            ->first();
        if(!is_null($verify)){
            return view('model.verify.edit', [
                'verify' => $verify
            ]);
        }else{
            $verify = new Verify();
            $verify->user_id = (int)$user_id;
            return view('model.verify.create', [
                'verify' => $verify
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verifies = Verify::where('user_id',Auth::user()->getAuthIdentifier())->get();
        return view('model.verify.index', [
            'verifies' => $verifies
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
        $verify = Verify::where('user_id', (int)$request->input('user_id'))
            ->where('user_id_from',Auth::user()->getAuthIdentifier())
            ->get()->first();
        if(is_null($verify)){
            Verify::create([
                'user_id_from' => Auth::user()->getAuthIdentifier(),
                'user_id' => (int)$request->input('user_id'),
                'text' => $request->input('text'),
            ]);
        }
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id_from
     * @return \Illuminate\Http\Response
     */
    public function editProfil($user_id_from)
    {
        $verify = Verify::where('user_id_from', (int)$user_id_from)
            ->where('user_id',  Auth::user()->getAuthIdentifier())
            ->first();
        return view('model.verify.editprofil', [
            'verify' => $verify
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $verify =  Verify::where('user_id', (int)$request->input('user_id'))
            ->where('user_id_from',  Auth::user()->getAuthIdentifier())
            ->get()->first();

        if(!is_null($verify)){
            $verify->text = $request->input('text');
            $verify->save();
        }
        return redirect()->route('welcome');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfil(Request $request)
    {

        $verify =  Verify::where('user_id_from', (int)$request->input('user_id_from'))
            ->where('user_id',  Auth::user()->getAuthIdentifier())
            ->get()->first();

        if(!is_null($verify)){
            $verify->text = $request->input('text');
            $verify->save();
        }
        return redirect()->route('userProfil');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function delete($user_id){
        $verify = Verify::where('user_id', (int)$user_id)
            ->where('user_id_from',  Auth::user()->getAuthIdentifier())
            ->first();
        return view('model.verify.delete', [
            'verify' => $verify
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $verify =  Verify::where('user_id', (int)$request->input('user_id'))
            ->where('user_id_from',  Auth::user()->getAuthIdentifier())
            ->get()->first();
        $verify->delete();
        return redirect()->route('home');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id_from
     * @return \Illuminate\Http\Response
     */
    public function deleteProfil($user_id_from){
        $verify = Verify::where('user_id_from', (int)$user_id_from)
            ->where('user_id',  Auth::user()->getAuthIdentifier())
            ->first();
        return view('model.verify.deleteprofil', [
            'verify' => $verify
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyProfil(Request $request)
    {
        $verify =  Verify::where('user_id_from', (int)$request->input('user_id_from'))
            ->where('user_id',  Auth::user()->getAuthIdentifier())
            ->get()->first();
        $verify->delete();
        return redirect()->route('userProfil');
    }
}
