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
                <b>POINTS</b>
               <div style="float: right;">
                <b>Comp Name :</b> <?php echo $points[0]->comp_name; ?>
               </div>
            </div>
            <div class="card-body">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Img</th>
        <th>Team</th>
        <th>M</th>
        <th>W</th>
        <th>L</th>
        <th>NRR</th>
        <th>Pts</th>
      </tr>
    </thead>
    <tbody>

   <?php $i=1; foreach($points as $point){ ?>
   <?php
        if(isset($point->teamImage) && !empty($point->teamImage)){
            $teamimage = $point->teamImage;
                }else{
            $teamimage = 'dummy.jpg';
        }
    ?>
      <tr>
        <td> <img src="{{ url('frontpages/images/teams/') }}/<?php echo $teamimage; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 30px;"></td>
        <td><?php echo $point->teamName; ?></td>
        <td><?php echo $point->Played; ?></td>
        <td><?php echo $point->Won; ?></td>
        <td><?php echo $point->Lost; ?></td>
        <td><?php echo $point->NetRunRate; ?></td>
        <td><?php echo $point->Points; ?></td>
      </tr>
    
    <?php $i++; } ?>
 
    </tbody>
  </table>
                    
        </div>
                    
        </div>


    </div>
</div>
</div>
@endsection
