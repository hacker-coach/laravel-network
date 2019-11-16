<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Post;

class PostController extends BasePrivatController
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

            'title' => ['required', 'string', 'max:50'],
            'teaser' => ['required', 'string', 'max:150'],
            'text' => 'string|max:1500|nullable',
            'links' => 'string|max:1500|nullable',
            'image1'     =>  'image|mimes:jpeg,png,jpg,gif|max:1024',
            'image2'     =>  'image|mimes:jpeg,png,jpg,gif|max:1024',
            'image3'     =>  'image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
    }
    /**
     * SET the specified resource in model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     */
    protected function setRequestToModel(Request $request,Post $post)
    {
            $post->show_post = (boolean)$request->input('show_post');
            $post->show_post_on_www = (boolean)$request->input('show_post_on_www');
            $post->title = $request->input('title');
            $post->text = $request->input('text');
            $post->teaser = $request->input('teaser');
            $post->links = $request->input('links');
            $this->upload($post,$request,'uploads-post','image1');
            $this->upload($post,$request,'uploads-post','image2');
            $this->upload($post,$request,'uploads-post','image3');
            $post->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id',Auth::user()->getAuthIdentifier())->get();
        return view('model.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $post = new Post();
        return view('model.post.create', [
            'post' => $post
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
        $post = new Post();
        $post = $post->create();

        if(!is_null($post)){
            $post->user_id = Auth::user()->getAuthIdentifier();
            $this->setRequestToModel($request,$post);
        }

        return redirect()->route('postIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.post.show', [
            'post' => $post
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
        $post = Post::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.post.edit', [
            'post' => $post
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
        $post = Post::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();

        if(!is_null($post)){
            $this->setRequestToModel($request,$post);
        }
        return redirect()->route('postIndex');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $post = Post::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.post.delete', [
            'post' => $post
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
        $post = Post::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        $post->delete();
        return redirect()->route('postIndex');
    }
}
