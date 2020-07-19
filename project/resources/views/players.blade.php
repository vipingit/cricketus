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
                <b>PLAYERS</b>
                <div style="float: right;">
                <b>Team :</b> <?php echo $team->name; ?>
               </div>
            </div>
            <div class="card-body">
          <?php $i=1; foreach($players as $player){ ?>
           <!--  <div class="card" style="margin-top: 10px;"> -->
                  <div class="col-md-6 blogShort">
                     <h3 style="margin-top: 5px;"><?php echo $player->firstName; ?></h3>
                     <?php
                        if(isset($player->imageUri) && !empty($player->imageUri)){
                            $teamimage = $player->imageUri;
                        }else{
                            $teamimage = 'dummy.jpg';
                        }
                        if(isset($player->imageUri) && !empty($player->imageUri)){
                            $playerimage = $player->imageUri;
                        }else{
                            $playerimage = 'dummy.jpg';
                        }
                      ?>
                     <img src="{{ url('frontpages/images/players/') }}/<?php echo $playerimage; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 105px;">
                     <article>
                        <p>
                            <small>Name:</small> <?php echo $player->firstName .' '.$player->lastName; ?></br>                            
                        </p>
                        <p><a href="<?php echo URL::to('/teams/'.$player->team_id.'/'.$player->id); ?>">See Player Detail</a></p>
                     </article>
                   
                 </div>
           <!--  </div> -->
            <?php $i++; } ?>

                    <div style="float: right;">
                        {{ $players->links() }}
                      </div>
        </div>
                    
        </div>






</div>


@endsection
