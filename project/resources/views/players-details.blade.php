@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">

<div class="col-md-2">
        <div class="card">
           @include('sidebar')
        </div>
    </div>

<?php
                        if(isset($playerindi->player_img) && !empty($playerindi->player_img)){
                            $playerimage = $playerindi->player_img;
                        }else{
                            $playerimage = 'dummy.jpg';
                        }
                      ?>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <b>PLAYER DETAILS</b>
                <div style="float: right;">
                <b>Team :</b> <?php echo $playerindi->team_name; ?>
                <b>Name :</b> <?php echo $playerindi->player_name; ?>  <img src="{{ url('public/frontpages/images/players/') }}/<?php echo $playerimage; ?>" alt="post img" class="pull-right img-responsive thumb margin10 img-thumbnail" style="width: 50px; margin-left: 10px;">
               </div>
            </div>
                    
             

            <div class="card-body">
          <?php $i=1; foreach($players as $player){ ?>
           <!--  <div class="card" style="margin-top: 10px;"> -->
                  <div class="col-md-12 blogShort">
                     <h3 style="margin-top: 5px;"><?php //echo $player->player_name; ?></h3>
                    
                     
                     <article>
    <div style="text-transform: uppercase;">        
        <small><b>batting average: </small></b> <?php echo $player->batting_average; ?></br>
        <small><b>bowling average: </small></b><?php echo $player->bowling_average; ?></br>
        <small><b>economy rate: </small></b><?php echo $player->economy_rate; ?></br>
        <small><b>fifties scored: </small></b><?php echo $player->fifties_scored; ?></br>
        
        <small><b>highest runs scored: </small></b><?php echo $player->highest_runs_scored; ?></br>
        <small><b>hundreds scored: </small></b><?php echo $player->hundreds_scored; ?></br>
        
        <small><b>not out: </small></b><?php echo $player->not_out; ?></br>
        <small><b>runs scored: </small></b><?php echo $player->runs_scored; ?></br>
        
        <small><b>strike rate: </small></b><?php echo $player->strike_rate; ?></br>
    </div>
                     </article>
                   
                 </div>
           <!--  </div> -->
            <?php $i++; } ?>
           

                   
        </div>
                    
        </div>






</div>


@endsection
