<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dgsvo',

        'is_ps', 'is_company','is_hunter', 'is_fan',
        'is_user_activ', 'is_user_www', 'is_user_show',

        'www', 'xing', 'linkedin','cbc',
        'slogan', 'image','teaser', 'text', 'city',
        'talent_anecdote_1', 'talent_anecdote_2','talent_anecdote_3',
        'talent_anecdote_1_header', 'talent_anecdote_2_header','talent_anecdote_3_header',
        'talent_special',
        'talent_special_header'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adverts() {
        return $this->hasMany('App\Advert');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function verifies() {
        return $this->hasMany('App\Verify');
    }
}
