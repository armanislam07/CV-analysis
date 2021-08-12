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
                            <div class="panel-heading"> <i class="fa fa-eye"></i> New Job Cacancy</div>
                            <form action="{{route('company.circular.submit')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Job Title:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="job_title" type="text" placeholder="Job Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Vacancy:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="vacancy" type="number" placeholder="Vacancy">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Job Context:</label>
                                        <div class="col-md-12">
                                            <div class="row job_context">
                                                <div class="col-md-12">
                                                    <textarea type="text" class="form-control" name="job_context"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Job Responsibilities:</label>
                                        <div class="col-md-12">
                                            <div class="row respons">
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" name="job_responsibilities[]">

                                                </div>
                                                <a href="#" class="addrow btn btn-success col-md-1"><i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" >                     
                                                    <div class="show">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Additional Requirements:</label>
                                        <div class="col-md-12">
                                            <div class="row additional_requirements">
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" name="additional_requirements[]">
                                                </div>
                                                <a href="#" class="addrow2 btn btn-success col-md-1"><i class="fa fa-plus"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" >                     
                                                    <div class="show2">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Compensation & Other Benefits:</label>
                                        <div class="col-md-12">
                                            <div class="row other_benefits">
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" name="other_benefits[]">
                                                </div>
                                                <a href="#" class="addrow3 btn btn-success col-md-1"><i class="fa fa-plus"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" >                     
                                                    <div class="show3">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Experience:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="experience" type="number" placeholder="Experience">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Experience Keyword:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="experience_keyword" type="text" placeholder="Experience Keyword Requirements">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Experience Area:</label>
                                        <div class="col-md-12">
                                            <div class="row experience_area">
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" name="experience_area[]">
                                                </div>
                                                <a href="#" class="addrow4 btn btn-success col-md-1"><i class="fa fa-plus"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" >                     
                                                    <div class="show4">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Educational Requirements:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="educational_requirements" type="text" placeholder="Educational Requirements">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Employment Status:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="employment_status" type="text" placeholder="Employment Status">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Application Deadline:</label>
                                        <div class="col-md-12">
                                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                <input  name="application_deadline" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" data-toggle="datetimepicker"/>
                                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Salary:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="salary" type="number" placeholder="Salary">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Job Catagories:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="job_catagories" type="text" placeholder="Catagories">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Job Location Area:</label>
                                        <div class="col-md-12">
                                            <!-- <input class="form-control" name="" type="text" placeholder="Job Location"> -->
                                            <select class="form-control" name="job_localtion_area">
                                                <option value="">--Select Area--</option>
                                                <option value="Any where in Bangladesh">Any where in Bangladesh</option>
                                                <option value="Barisal">Barisal</option>
                                                <option value="Chittagong">Chittagong</option>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Khulna">Khulna</option>
                                                <option value="Mymengingh">Mymengingh</option>
                                                <option value="Rajshahi">Rajshahi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Accepted Percentage:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="accepted_percentage" type="number" placeholder="Accepted percentage">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 form-group">
                                        <label class="col-md-12 control-label">Job Location Area:</label>
                                        <div class="col-md-12">
                                            
                                            <select class="form-control" name="job_localtion_area">
                                                <option value="">--Select Area--</option>
                                                <option value="">IT </option>
                                                <option value="">Computer Operator</option>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="form-group col-md-6">
                                        <div class="col-md-8 col-md-offset-5">
                                            <input type="submit" class="btn btn-success" value="Publish" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
