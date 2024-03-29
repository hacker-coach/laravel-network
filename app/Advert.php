<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Advert extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'show_advert', 'show_advert_on_www',
        'image',
        'teaser','title','text','link',
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

    private function parseContent($text){
           return Markdown::convertToHtml((string)$text);
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
