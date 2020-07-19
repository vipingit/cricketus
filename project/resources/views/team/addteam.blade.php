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
                <b>TEAMS</b>
               
            </div>
             <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Add Teams</h2>                        
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
            {!! Form::open(['route' => 'team.store','role' => 'form', 'class'=>'department-form','id'=>'answerfrm', 'files' => true ]) !!}
            <div class="row clearfix">
                <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="card">                      
                        <div class="body">                            
                            <small class="text-muted">Name</small>
                            <p>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="name" required id="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                            </p>   

                            <small class="text-muted">Short Name</small>
                            <p>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="short_name" id="short_name" required class="form-control" placeholder="Enter Short Name">
                                    </div>
                                </div>
                            </p>   
                            <small class="text-muted">Image</small>
                            <p>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" style="height: 41px; background-color: #ccc" name="image" class="form-control" required>
                                        
                                    </div>
                                </div>
                            </p> 
                            <input class="checkbox-tick" value="1" type="hidden" name="status">

                            <div class="col-md-12" style="text-align: center;">
                        <div class="cstm_sub">
                            <input align="center" type="submit" class="btn btn-round btn-primary" value="Add">
                            <a href="{{route('team.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
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
</div>
@endsection
