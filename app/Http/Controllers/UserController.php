<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Post;
use App\Advert;
use App\Verify;

class UserController extends BasePrivatController
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

            'name' => ['required', 'string', 'max:50'],
            'slogan' => ['required', 'string', 'max:150'],
            'linkedin' =>  'url|max:500|nullable',
            'xing' => 'url|max:500|nullable',
            'www' => 'url|max:500|nullable',
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:ratio=1/1',
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorTalent(array $data)
    {
        return Validator::make($data, [
            'talent_anecdote_1' => 'string|max:2500|nullable',
            'talent_anecdote_2' => 'string|max:2500|nullable',
            'talent_anecdote_3' => 'string|max:2500|nullable',
            'talent_special' => 'string|max:2500|nullable',
            'talent_anecdote_1_header' => 'string|max:2500|nullable',
            'talent_anecdote_2_header' => 'string|max:2500|nullable',
            'talent_anecdote_3_header' => 'string|max:2500|nullable',
            'talent_special_header' => 'string|max:2500|nullable',
        ]);
    }
    /**
     * SET the specified resource in model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     */
    protected function setRequestToModel(Request $request,User $user)
    {
        $user->show_profil = (boolean)$request->input('show_profil');
        $user->show_profil_www = (boolean)$request->input('show_profil_www');
        $user->show_profil_for_company = (boolean)$request->input('show_profil_for_company');

        $user->name = $request->input('name');
        $user->slogan = $request->input('slogan');

        $user->xing = $request->input('xing');
        $user->linkedin = $request->input('linkedin');
        $user->www = $request->input('www');
    }

    /**
     * Display the specified resource.
     * @param  integer  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::where('id', (int)$user_id)->first();
        return view('model.user.show', [
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     * @param  integer  $user_id
     * @return \Illuminate\Http\Response
     */
    public function showCompany($user_id)
    {
        $user = User::where('id', (int)$user_id)->where('is_company', true)->first();
        return view('model.user.showcompany', [
            'user' => $user
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        $user = Auth::user();
        return view('model.user.profil', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('model.user.edit', [
            'user' => $user
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
        $this->validator($request->all())->validate();
        $user = Auth::user();
        $this->upload($user,$request,'uploads-user','image');
        $this->setRequestToModel($request,$user);
        $user->save();
        return redirect()->route('userProfil');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editTalent()
    {
        $user = Auth::user();
        return view('model.user.edittalent', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateTalent(Request $request)
    {
        $this->validatorTalent($request->all())->validate();
        $user = Auth::user();
        $user->talent_anecdote_1 = $request->input('talent_anecdote_1');
        $user->talent_anecdote_2 = $request->input('talent_anecdote_2');
        $user->talent_anecdote_3 = $request->input('talent_anecdote_3');
        $user->talent_special = $request->input('talent_special');
        $user->save();
        return redirect()->route('userProfil');
    }

    public function delete(){
        $user = Auth::user();
        return view('model.user.delete', [
            'user' => $user
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();
        $this->uploadDelete($user->image,'uploads-user');

        $verifies =  Verify::where('user_id_from',$user->id)->get();
        foreach($verifies as $verify){
            $verify->delete();
        }
        $verifies =  Verify::where('user_id',$user->id)->get();
        foreach($verifies as $verify){
            $verify->delete();
        }
        $posts =  Post::where('user_id',$user->id)->get();
        foreach($posts as $post){
            $this->uploadDelete($post->image1,'uploads-post');
            $this->uploadDelete($post->image2,'uploads-post');
            $this->uploadDelete($post->image3,'uploads-post');
            $post->delete();
        }
        $adverts =  Advert::where('user_id',$user->id)->get();
        foreach($adverts as $advert){
            $this->uploadDelete($advert->image1,'uploads-advert');
            $advert->delete();
        }
        $user->delete();
        Auth::logout();
        return redirect()->route('memberDe');
    }
}
