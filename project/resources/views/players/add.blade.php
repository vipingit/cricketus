@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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
                <b>Players</b>
               
            </div>
             <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Add Players</h2>
                    </div>  

                     <div class="col-md-7 col-sm-12">
                        
                        @if (session('confirm'))
                        <div class="alert alert-success" role="alert"><p class="text-success">{{ session('confirm') }}</p></div>
                        @endif @if (session('error'))
                        <div class="alert alert-danger" role="alert"><p class="text-danger">{{ session('error') }}</p></div>
                        @endif
                        @if (session('message'))
                        <div class="alert alert-warning" role="alert"><p class="text-warning">{{ session('message') }}</p></div>
                        @endif
                    </div>
                              
                </div>
            </div>            
            {!! Form::open(['route' => 'player.store','role' => 'form', 'class'=>'department-form','id'=>'answerfrm', 'files' => true ]) !!}
                <div class="row clearfix">
                  <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="card">                        
                      <div class="box-body">
                          <div class="form-group">
                            <label for="cat_name">First Name</label>                
                               {!! Form::text('firstName', '',['placeholder'=>'First Name','class'=>'form-control', 'required'=>'required'])!!}
                          </div>
                          <div class="form-group">
                            <label for="cat_name">Last Name</label>                
                               {!! Form::text('lastName', '',['placeholder'=>'Last Name','class'=>'form-control', 'required'=>'required'])!!}
                          </div> 
                          <div class="form-group">
                            <label for="cat_name">Team</label>  
                              <select name="team_id" class="form-control">
                              @foreach($team as $k=>$value)                              
                                <option value="{{ $k }}">{{ $value }} </option>
                              @endforeach 
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="cat_name">Image</label>                
                              {!! Form::input('file','imageUri','' ,['class'=>'form-control title'])!!} 
                          </div>
                          <div class="form-group">
                            <label for="cat_name">Joursey Number</label>                
                               {!! Form::text('jersey', '',['placeholder'=>'Joursey Number','class'=>'form-control', 'required'=>'required'])!!}
                          </div>
                          <div class="form-group">
                            <label for="cat_name">Country</label>                
                               {!! Form::text('country', '',['placeholder'=>'Country','class'=>'form-control', 'required'=>'required'])!!}
                          </div>
                          <input class="checkbox-tick" value="1" type="hidden" name="status">

                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="{{route('player.index')}}" class="btn btn-danger">Cancel</a>
                      </div>
                    </div>
                  </div>
                </div>
            </forms>
        </div>
    </div>
                    
        </div>


    </div>
</div>
</div>
@endsection
