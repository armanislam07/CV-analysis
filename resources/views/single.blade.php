@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="categories">
        <div class="container">
            <div class="row">

                <div class="col-md-12 job-preview">
                    @if(\Session::has('error'))
                        <div class="alert alert-danger" >
                            {{ \Session::get('error')}}
                        </div>
                    @endif
                    @foreach($circular_details as $details)
                    <div class="row">
                        <div class="col-md-8">
                            <div class="job_title">
                                <h3>{{$details->job_title}}</h3>
                            </div>
                            <div class="job_title">
                                <h4>{{$details->com_name}}</h4>
                            </div>
                            <div class="job_des">
                                <h5>Vacancy</h5>
                                <p>{{$details->vacancy}}</p>
                            </div>
                            <div class="job_des">
                                <h5>Job Context</h5>
                                <ul>
                                    <li>{{$details->job_context}}</li>
                                </ul>
                            </div>
                    @endforeach
                    
                            <div class="job_des">
                                <h5>Job Responsibilities</h5>
                                @foreach($responsibilities as $details)
                                <ul>
                                    <li>{{$details->responsibilities}}</li>
                                    
                                </ul>
                                @endforeach
                            </div>
                    
                    @foreach($circular_details as $details)
                            <div class="job_des">
                                <h5>Employment Status</h5>
                                <p>{{$details->employment_status}}</p>
                            </div>
                            <div class="job_des">
                                <h5>Educational Requirements</h5>
                                <ul>
                                    <li>{{$details->education_requirements}}</li>
                                </ul>
                            </div>
                    @endforeach
                    
                            <div class="job_des">
                                <h5>Additional Requirements</h5>
                                @foreach($requirements as $details)
                                <ul>
                                    <li>{{$details->requirements}}</li>
                                </ul>
                                @endforeach
                            </div>
                    
                    
                            <div class="job_des">
                                <h5>Compensation & Other Benefits</h5>
                                @foreach($otherBenifits as $details)
                                <ul>
                                    <li>{{$details->other_benefits}}</li>
                                </ul>
                                @endforeach
                            </div>
                    
                    @foreach($circular_details as $details)
                            <div class="job_des">
                                <h5>Salary</h5>
                                <p>{{$details->salary}}</p>
                            </div>
                            <div class="job_des">
                                <h5>Job Location</h5>
                                <p>{{$details->job_area}}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="right job-summary">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Job Summary</div>
                                    <div class="panel-body">
                                        
                                        <h4>
                                            <strong>Published on:</strong>&nbsp;{{$details->created_at}}
                                        </h4>
                                        <h4>
                                            <strong>Vacancy:</strong>&nbsp;
                                            {{$details->vacancy}}
                                        </h4>
                                        <h4>
                                            <strong>Employment Status:</strong>&nbsp;{{$details->employment_status}}
                                        </h4>
                                        <h4>
                                            <strong>Experience:</strong>&nbsp;At least {{$details->experience}} year(s)
                                        </h4>
                                        <h4 style="line-height: 24px;">
                                            <strong>Job Location:</strong>&nbsp;{{$details->job_area}}
                                        </h4>   
                                        <h4>
                                            <strong>Application Deadline:</strong>&nbsp;{{$details->job_deadline}}
                                        </h4>
                                                                            
                                    </div>
                                </div>
                            </div>
                            <div class="right action-section">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    
                                    <span id="shortlist"><a style="" href=""><i class="fa fa-star"></i>&nbsp;Shortlist this job</a></span>
                                        <span>
                                            <a class="sub_window_new"  href="">
                                                <i class="fa fa-envelope"></i>&nbsp;Share by Email
                                            </a>
                                        </span>
                                        <span class="print">
                                            <a href="">
                                                <i class="fa fa-print"></i>&nbsp;Print this job
                                            </a>
                                        </span>
                                        <span>
                                            <a href="" class="sub_window_new">
                                                <i class="fa fa-file"></i>&nbsp;View all jobs of this company
                                            </a>
                                        </span>
                                        <span>
                                            <a href="" class="sub_window_new">
                                                <i class="fa fa-flag"></i>&nbsp;Report this job
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide text-center">
                                <div class="apto">
                                    <h3>
                                    Apply Procedure
                                    </h3>
                                </div>
                                <div class="apply text-center">
                                    <a class="btn btn-primary" href="{{route('apply.match', $details->id)}}" >Apply Online</a>
                                </div>
                                <div class="gra-padded gra-bordered gra-centered"></div>
                                <!-- <div>
                                    
                                    <h4>Email</h4>
                                    <div class="or text-center">
                                                                        
                                        Send your CV to <strong> cv@domain.com </strong> 
                                        or to Email CV from <strong>MY JOBS</strong> account <a href="mailto:" target="mine">Click here</a>.
                                    </div>
                                    <span class="date">
                                        Application Deadline : <strong> March 28, 2019</strong>
                                    </span>
                                </div> -->
                            </div>
                            <div class="company-info">
                                @foreach($circular_details as $details)
                                <div class="information">
                                    <h5>Company Information</h5>
                                    <span>{{$details->com_name}}</span>
                                    
                                        <span>Address : {{$details->com_Haddress}}</span>
                                    
                                </div>
                                @endforeach
                                <div class="follow-button">
                                    <div class="follow-button" id="followbutton">
                                        <a class="btn btn-default" href="#"><i id="btnImg" class="fa fa-plus"></i>&nbsp;<span id="btnText">Follow</span></a>
                                    </div>
                                </div> 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
 @endsection   