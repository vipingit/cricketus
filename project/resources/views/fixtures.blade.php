@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">

<div class="col-md-2">
        <div class="card">
           @include('sidebar')
        </div>
    </div>

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <b>FIXTURES</b>
               
            </div>
            <div class="card-body">
                <div class="row">
          <?php $i=1; foreach($fixtures as $fixture){ 
            $away_team = DB::table ( 'cricket_teams' )->where('id',$fixture->away_team)->first();
            $home_team = DB::table ( 'cricket_teams' )->where('id',$fixture->home_team)->first();
            ?>
                    <?php
                        if(isset($away_team->image) && !empty($away_team->image)){
                            $away_team_img = $away_team->image;
                        }else{
                            $away_team_img = 'dummy_team.jpeg';
                        }

                        if(isset($home_team->image) && !empty($home_team->image)){
                            $home_team_img = $home_team->image;
                        }else{
                            $home_team_img = 'dummy_team.jpeg';
                        }

            // $match_msg = DB::table ( 'cricket_match_detail' )->where('id', $fixture->id)->first();
$match_msg ='';


                      ?>
           <div class="col-sm-12">
            <div class="panel panel-default">
            <div class="panel-heading"><?php echo $fixture->comp_name; ?>
                <div style="float: right;"><?php echo $fixture->description; ?></div>
            </div>
    
           <div class="panel-body">
            
            <div class="col-sm-12">
              <div class="col-sm-6">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <img src="{{ url('frontpages/images/teams/') }}/<?php echo $away_team_img; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 80px;">
                    </div>
                    <div class="col-sm-8">
                       <div style="margin-top: 16px;"> <b><?php echo $fixture->away_team_name; ?></b></div>
                    </div>
                </div>
              </div>

               <div class="col-sm-6">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <img src="{{ url('frontpages/images/teams/') }}/<?php echo $home_team_img; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 80px;">
                    </div>
                    <div class="col-sm-8">
                         <div style="margin-top: 16px;"> <b><?php echo $fixture->home_team_name; ?></b></div>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div style="text-align:right; margin-top: 20px;"><b>Date:</b> <?php echo $fixture->game_date_string; ?> <b> | Venue: </b> <?php echo $fixture->venue; ?></div>
                </div>
                <div class="col-sm-6">
                    <div style="text-align:left; margin-top: 20px;"><b>Match Status: </b> <?php echo isset($match_msg->result_text)?$match_msg->result_text:"Not Available"; ?></div>
                </div>
            </div>
          </div>
              

           </div>
            </div>

            <?php $i++; } ?>
            </div>

                    <div style="float: right;">
                        {{ $fixtures->links() }}
                      </div>
        </div>
                    
        </div>


    </div>
</div>
</div>
@endsection
