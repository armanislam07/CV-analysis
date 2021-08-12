@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-4">
                    <div class="row">
                        
                    </div>
                </div>
                <div class="col-md-8">
                    @foreach($jobs as $job)
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
                                <img src="/images/company_logo/{{$job->com_logo}}" style="height: 100px;">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
 @endsection   