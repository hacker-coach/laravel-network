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
        'name', 'email', 'password',

        'is_activ_profil', 'is_activ_member',
        'show_profil', 'show_profil_www', 'show_profil_for_company',
        'is_company', 'is_company_member_access', 'is_company_www_advert',

        'www', 'xing', 'linkedin','cbc',
        'slogan', 'image',
        'talent_anecdote_1', 'talent_anecdote_2','talent_anecdote_3', 'talent_special',
    ];

    /**
     * The attributes that should be hidden for arrays..
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
