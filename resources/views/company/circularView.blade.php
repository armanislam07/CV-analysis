@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @if(count($errors) > 0)
                    <div class="alert alert-danger" >
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Session::has('error'))
                    <div class="alert alert-danger" >
                        {{ \Session::get('error')}}
                    </div>
                @endif
                @if(\Session::has('message'))
                    <div class="alert alert-success">
                        {{ \Session::get('message')}}
                    </div>
                @endif
                <div class="col-md-12 job-preview">
                    <div class="right job-summary">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <i class="fa fa-eye"></i> Posted Job Circular</div>
                            
                                <div class="row">
                                    <?php $i = 1;?>
                                    
                                    <table class="table table-borderless justify-content-center">
                                         
                                        <thead>
                                            <tr>
                                                <th width="5%">Circular</th>
                                                <th width="15%">Job Title</th>
                                                <th width="5%">Vacancy</th>
                                                <th width="15%">Employment Status</th>
                                                <th width="10%">Salary</th>
                                                <th width="15%">Application Deadline</th>
                                                <th width="15%">Job Location</th>
                                                <!-- <th width="20%">Action</th> -->
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            @foreach($circulars as $circular)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td width="15%">{{$circular->job_title}}</td>
                                                <td>{{$circular->vacancy}}</td>
                                                <td>{{$circular->employment_status}}</td>
                                                <td>{{$circular->salary}}</td>
                                                <td>{{$circular->job_deadline}}</td>
                                                <td>{{$circular->job_area}}</td>
                                                <!-- <td>
                                                    <a href="" class="btn btn-primary">Edit</a> | 
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </td> -->
                                            </tr>
                                            <?php $i++;?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
