@extends('layouts.app')

@section('content')

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>


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
                <b>Player</b>
               
            </div>
             <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Edit Player</h2>
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
            <div class="box-body">              
              {{ Form::open(array('method' => 'PATCH','route' => ['player.update',$info->id], 'files' => true )) }}
              
                <div class="form-group">
                  <label for="cat_name">Page Name</label>
                     {!! Form::text('firstName', $info->firstName,['placeholder'=>'First Name','class'=>'form-control', 'required'=>'required'])!!}
                </div>
                <div class="form-group">
                  <label for="cat_name">Last Name</label>                 
                    {!! Form::text('lastName', $info->lastName,['id'=>'lastName', 'placeholder'=>'Last Name','class'=>'form-control','readonly' => 'true'])!!}
                </div>                         
                <div class="form-group">
                  <label for="cat_name">Team</label>  
                    <select name="team_id" class="form-control">
                    @foreach($team as $k=>$value)                              
                      <option value="{{ $k }}" @if($k==$info->team_id) selected @endif>{{ $value }} </option>
                    @endforeach 
                    </select>
                </div>         
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="cat_name">Image</label>
                       {!! Form::input('file','imageUri','' ,['class'=>'form-control title'])!!}
                       @if($info->imageUri!="")
                       <a target="_blank" class="viewfile"  href="{!! asset('frontpages/images/players/'.$info->imageUri) !!}">View</a>
                       @endif
                    </div>                    
                  </div>
                </div>                
                <div class="form-group">
                      <label for="cat_name">Jersey</label>                 
                         {!! Form::text('jersey', $info->jersey,['placeholder'=>' Jersey','class'=>'form-control'])!!}
                </div>               
                <div class="form-group">
                  <label for="cat_name">Country</label>                 
                     {!! Form::text('country', $info->country,['placeholder'=>'country','id'=>'country','class'=>'form-control'])!!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('player.index')}}" class="btn btn-danger">Cancel</a>
              </form>
              </div>
        </div>
    </div>
                    
        </div>


    </div>
</div>
</div>
@endsection
