<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'user_id_from',
        'show_verify', 'show_know','show_has', 'show_message','show_answer',
        'check_of_super_ps', 'message_check_of_super_ps','has_super_special_talent',

        'has_extrem_iq', 'has_super_extrem_iq',
        'has_extrem_creative','has_super_extrem_creative',
        'has_extrem_thinker', 'has_super_extrem_thinker',
        'has_extrem_language','has_super_extrem_language',
        'has_extrem_eq', 'has_super_extrem_eq',
        'has_extrem_speaker','has_super_extrem_speaker',
        'has_extrem_writer', 'has_super_extrem_writer',
        'has_extrem_logic','has_super_extrem_logic',
        'has_extrem_imagine', 'has_super_extrem_imagine',

        'contact_real_friend_or_online',

        'know_from_mensa', 'know_from_tns',
        'know_from_mhn','know_from_cbc',
        'know_from_iq_club',

        'text','answer_of_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

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
