<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Contact extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deleted',
        'company', 'city', 'phone', 'mail','text', 'links',
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
        $text =  Markdown::convertToHtml((string)$text);
        return $text;
    }

    public function informations() {
        return $this->hasMany('App\Info');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

}
