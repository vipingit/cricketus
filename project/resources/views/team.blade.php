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
                <b>TEAMS</b>
               
            </div>
            <div class="card-body">
          <?php $i=1; foreach($teams as $team){ ?>
            <div class="card" style="margin-top: 10px;">
                  <div class="col-md-12 blogShort">
                     <h3 style="margin-top: 5px;"><?php echo $team->name; ?></h3>
                     <?php
                        if(isset($team->image) && !empty($team->image)){
                            $teamimage = $team->image;
                        }else{
                            $teamimage = 'dummy_team.jpeg';
                        }
                      ?>
                     <img src="{{ url('frontpages/images/teams/') }}/<?php echo $teamimage; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 100px;">
                     <article>
                        <p><?php echo $team->name; ?></p>
                        <p><small><?php echo $team->short_name; ?></small></p>
                     </article>
                     <a class="btn btn-blog pull-right marginBottom10" href="<?php echo URL::to('/teams/'.$team->id); ?>" style="margin-bottom: 10px;">See All Players</a> 
                 </div>
            </div>
            <?php $i++; } ?>

                    <div style="float: right;">
                        {{ $teams->links() }}
                      </div>
        </div>
                    
        </div>


    </div>
</div>
</div>
@endsection
