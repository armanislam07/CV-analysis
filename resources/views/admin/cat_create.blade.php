@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12 job-preview">
                    <div class="right job-summary">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <i class="fa fa-eye"></i> View Resume</div>
                            
                            <div class="panel-body col-md-12">
                                <div class="row">
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger" >
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(\Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ \Session::get('success')}}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="row">
                        <form action="{{route('insert.categories.submit')}}" class="col-md-12" method="post">
                    
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">Categories:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="categorie" type="text" placeholder="Categories">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-5">
                                                <input type="submit" class="btn btn-primary" />
                                            </div>
                                        </div>
                                        
                                    </form>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                    <!-- <form action="" class="col-md-12" method="post">
                    
                                        @csrf
                                        <div class="form-group ">
                                            <label class="col-md-12 control-label">Division:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="division" type="text" placeholder="Division">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-5">
                                                <input type="submit" class="btn btn-primary" />
                                            </div>
                                        </div>
                                        
                                    </form> -->
                                </div>
                                </div>
                            </div>                                       
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
