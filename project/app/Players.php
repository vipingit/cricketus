<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Players;
use App\Team;
class Players extends Model
{
    public $table = 'players';

    protected $fillable = ['firstName', 'lastName','imageUri','jersey','country','team_id'];

    public function team()
    {
    	return $this->belongsTo('App\Team')->withDefault([
        'name' => 'Guest Author',
    ]);
        //return $this->belongsTo('Team::class','team_id','id')->orderBy('name');
       //return $this->hasOne(Team::class,'id','team_id');
    }
}
