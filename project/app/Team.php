<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Redirect;
use App\Team;

class Team extends Model {
	public $table = 'cricket_teams';
	
	/**
	 * The aibutes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 
			'name','short_name'
	];	
		
}
