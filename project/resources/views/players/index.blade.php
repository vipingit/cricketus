@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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
                <b>Team :</b> <?php //echo $team->name; ?>
                <a class="btn btn-success addcls" href="{{route('player.create')}}"><i class="fa fa-plus"></i> Add New</a>
               </div>
            </div>
             <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Player Name</th>
                   <th>Team</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($players as $value)
                  <tr>
                    <td>{{$value->firstName}}</td>                      
                    <td>{{$value->team->name}}</td>                      

                    <td>
                      <a href="{{ route('player.edit', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Click here to edit"> <i class="fa fa-edit">Edit</i></a>
                     </td>
                  </tr>
                  @endforeach
                



                </tfoot>
              </table>
                <div class="pagenaction_cls">  {!!  $players->links() !!} </div>
            </div>                               
        </div>
</div>


@endsection
