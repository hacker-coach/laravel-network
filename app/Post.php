<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'show_post', 'show_post_on_www',
        'image1', 'image2','image3',
        'image1title', 'image2title','image3title',
        'teaser', 'title','text', 'links',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function getMarkdownText(){
        return $this->parseContent($this->text);
    }

    public function getMarkdownLinks(){
        return $this->parseContent($this->links);
    }

    private function parseContent($text){
        $text =  Markdown::convertToHtml((string)$text);
        $text = str_replace('[[1]]',$this->getImageHtml($this->image1,$this->image1title),$text);
        $text = str_replace('[[2]]',$this->getImageHtml($this->image2,$this->image2title),$text);
        $text = str_replace('[[3]]',$this->getImageHtml($this->image3,$this->image3title),$text);
        return $text;
    }

    private function getImageHtml($image,$text){
        $html = '
        <div class="card" style="width: auto; margin-bottom: 5px;margin-top: 5px;">
          <img class="card-img-top" src="/uploads/post###image###" alt="###text###">
          <div class="card-body"><p class="card-text">###text###</p></div>
        </div>
        ';
        $html = str_replace('###image###',$image,$html);
        $html = str_replace('###text###',$text,$html);
        return $html;
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
