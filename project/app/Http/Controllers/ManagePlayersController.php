<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Players;
use App\Team;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class ManagePlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Players $players)
    {
        $players = $players->where('status','1')->paginate(10); 
        //dd($players->team);
        return view ( "players.index", compact('players','confirm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Team::pluck('name', 'id');
        return view ( 'players.add', compact('players','team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Players $info)
    {
        $data = $request->all();
        $rules = array (
                'firstName' => 'required',
                'lastName' => 'required',
                'imageUri' => 'required|mimes:jpg,png,gif,jpeg,JPG,GIF,PNG,JPEG' 
        );
        $validator = Validator::make ( $data, $rules );
        if ($validator->fails ()) {
            Session::flash('message', 'Fill All the required field.');
            return Redirect::to ( '/player/create' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
        } else {
        $info->fill($request->all()); 
        if( $request->hasFile('imageUri') ){
            $name = $request->file('imageUri')->getClientOriginalName();
            $name =  md5(uniqid().$name).'.'. $request->file('imageUri')->getClientOriginalExtension();
            $path = $request->file('imageUri')->move('frontpages/images/players',$name);
            $info->imageUri = $name;            
         }
          
        $info->save();
        Session::flash('message', 'Players added successfully.');
        return redirect()->back()->withSuccess('Players added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info= Players::find($id); 
        $team = Team::pluck('name', 'id');
        return view('players.edit',compact('info','team'));
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
        $data = $request->all();
        $rules = array (
                'firstName' => 'required',
                'lastName' => 'required',
                'imageUri' => 'required|mimes:jpg,png,gif,jpeg,JPG,GIF,PNG,JPEG' 
        );
        $validator = Validator::make ( $data, $rules );
        if ($validator->fails ()) {
            Session::flash('message', 'Fill All the required field.');
            return Redirect::to ( '/player/edit' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
        } else {
        $info = Players::find($id);
        $info->fill($request->all()); 
        if( $request->hasFile('imageUri') ){
                $name = $request->file('imageUri')->getClientOriginalName();
                $name =  md5(uniqid().$name).'.'. $request->file('imageUri')->getClientOriginalExtension();
                $path = $request->file('imageUri')->move('frontpages/images/players',$name);
               $info->imageUri = $name;            
         }          
        $info->save();
        Session::flash('message', 'Players added successfully.');
        return redirect()->back()->withSuccess('Players added successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
