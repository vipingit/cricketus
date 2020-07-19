<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\ErrorCodes;
use App\Http\SuccessCodes;
use DB;
use App\Team;
use App\Players;
use App\Playerhistory;
use App\Fixtures;

class TeamController extends Controller { 
	public function getTeams(Team $team) {
		$team = Team::select('name','image')->get();
		$resData=[
				'team'=>$team,                
				'msg'=>'Success'
              ];	
		return response()->json($resData, 201); 
	}
	public function getApiPlayers($teamId) {
		$players = Players::where('players.team_id',$teamId)->select('firstName','lastName','name')
		->join('cricket_teams','cricket_teams.id','players.team_id')->paginate(10);
		return response()->json($players, 201); 
	}
	public function getPlayers($teamId) {
		$team = Team::find ( $teamId );
		$players = Players::where('players.team_id',$teamId)->paginate(10);
		return view ( "players", [ 
				"confirm",
				'players' => $players,
				'team' => $team
		] );
	}

	public function getPlayersDetails($teamId,$player_id) { 
		$playerindi = Players::find($player_id)->first();   
		$players = Playerhistory::where('player_id', $player_id)
		->select ('player_history.*') 		
		->get();

		return view ( "players-details", [ 
				"confirm",
				'players' => $players,
				'playerindi' => $playerindi
		] );
	}

	public function getPoints() {

		$points = DB::table ( 'cricket_points_table' )
		->distinct('cricket_points_table.team_id')
		->join ( 'fixtures', 'fixtures.comp_id', '=', 'cricket_points_table.compitation_id' )
		->leftJoin ( 'cricket_teams', 'cricket_teams.id', '=', 'cricket_points_table.team_id' )		
		->orderBy ( 'cricket_points_table.Points', 'DESC' )
		->select ('cricket_points_table.*', 'fixtures.comp_name as comp_name', 'cricket_teams.image as teamImage', 'cricket_teams.name as teamName')
		//->groupBy('cricket_points_table.team_id')
		->get();
		return view ( "points", [ 
				"confirm",
				'points' => $points 
		] );
	}

	public function fixtures() {
		$fixtures= Fixtures::orderBy ('id','asc')->paginate(10);;
		return view ( "fixtures", [ 
				"confirm",
				'fixtures' => $fixtures 
		] );
	}
}
