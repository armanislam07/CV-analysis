@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
        	<div class="panel-heading"> <i class="fa fa-eye"></i> Matched Jobs Circular</div>
        	<div class="heading">
        		@if(\Session::has('error'))
                    <div class="alert alert-danger">
                        {{\Session::get('error')}}
                    </div>
                @endif
        	</div>
        	@foreach($jobs as $job)
        	<div class="heading">
        		@if(empty($job))
                    <div class="text text-danger">
                        <h4><center><i></i>Do not match job circular</center></h4>
                    </div>
                @endif
        	</div>
        	<div class="row">
        		
	        	<div class="col-md-6">
	                <div class="norm-jobs-wrapper">
	                    <div class="row">
	                        <div class="col-md-12">
	                            <div class="job-title-text">
	                                <a href="{{route('job.details', $job->id)}}">{{$job->job_title}}</a>
	                            </div>
	                        </div>
	                        <div class="col-md-8">
	                            <div class="comp-name-text">
	                                <p>{{$job->com_name}}</p>
	                            </div>
	                        </div>
	                        <div class="col-md-8">
	                            <div class="norm-jobs-list">
	                                <ul class="list-unstyled">
	                                    <li><i class="fa fa-map-marker"></i>{{$job->job_area}}</li>
	                                    <li><i class="fa fa-graduation-cap"></i>{{$job->education_requirements}}</li>
	                                    <li><i class="fa fa-briefcase"></i>At least {{$job->experience}} year(s)</li>
	                                    <li><i class="fa fa-clock-o"></i>Deadline Deadline: {{$job->job_deadline}}</li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="col-md-4">
	                            <img src="/images/company_logo/{{$job->com_logo}}" style="width:100%;">
	                        </div>
	                    </div>
	                </div>
	        	</div>
	        	
        	</div>
        	@endforeach
        </div>
    </div>
</div>
@endsection