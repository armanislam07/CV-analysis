<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!--Accordion wrapper-->
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <!-- Accordion card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne1">
                              <a data-toggle="collapse" data-parent="#accordionEx" href="#PercollapseOne1" aria-expanded="true"
                                aria-controls="PercollapseOne1">
                                <h5 class="mb-0">
                                  Personal Details  <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                              </a>
                            </div>
                            <!-- Card body -->
                            <div id="PercollapseOne1" class="collapse show bootstrap-iso" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                <div class="card-body">
                                    @if(\Session::has('message'))
                                        <div class="alert alert-success">
                                            {{ \Session::get('message')}}
                                        </div>
                                    @endif
                                    @foreach($userPersonnel as $userRequme)
                                    <form action="{{route('edit.cv.submit', $userRequme->id)}}" class="form-horizontal col-md-12" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6 ">
                                                <label class="col-md-12 control-label">First Name:</label>
                                                <div class="col-md-12">
                                                    <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" type="text" value="{{$userRequme->first_name}}" placeholder="First Name">
                                                    @if ($errors->has('first_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-md-12 control-label">Nationality Person:</label>
                                                <div class="col-md-12">
                                                    <!-- <input class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" type="text" value="{{old('nationality')}}" placeholder="Nationality Person"> -->
                                                    <select id="inputState" class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality">
                                                        <option selected value="{{$userRequme->nationality}}">{{$userRequme->nationality}}</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="India">India</option>
                                                    </select>
                                                    @if ($errors->has('nationality'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nationality') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-md-12 control-label">Last Name:</label>
                                                <div class="col-md-12">
                                                    
                                                    <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" type="text" value="{{$userRequme->last_name}}" placeholder="Last Name">
                                                    @if ($errors->has('last_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-md-12 control-label">National Id No:</label>
                                                <div class="col-md-12">
                                                    <input class="form-control{{ $errors->has('national_ID') ? ' is-invalid' : '' }}" name="national_ID" type="text" value="{{$userRequme->nid_no}}" placeholder="National Id No">                                      
                                                    @if ($errors->has('national_ID'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('national_ID') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="col-md-12 control-label">Father's Name:</label>
                                                <div class="col-md-12">
                                                <input class="form-control{{ $errors->has('fathers_name') ? ' is-invalid' : '' }}" name="fathers_name" value="{{$userRequme->father_name}}" type="text" placeholder="Father's Name">
                                                @if ($errors->has('fathers_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('fathers_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="col-md-12 control-label">Mobile Number:</label>
                                                <div class="col-md-12">
                                                <input class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" name="mobile_number" type="text" value="{{$userRequme->mobile_number}}" placeholder="Mobile Number">
                                                @if ($errors->has('mobile_number'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('mobile_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="col-md-12 control-label">Mother's Name:</label>
                                                <div class="col-md-12">
                                                <input class="form-control{{ $errors->has('mothers_name') ? ' is-invalid' : '' }}" name="mothers_name" type="text" value="{{$userRequme->mother_name}}" placeholder="Mother's Name">
                                                @if ($errors->has('mothers_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('mothers_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="col-md-12 control-label">Other Number 2:</label>
                                                <div class="col-md-12">
                                                <input class="form-control" name="mobile_number2" type="text" value=" {{$userRequme->mobile_number2}}" placeholder="Other Number 2">                
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group ">
                                                <label class="control-label col-md-12 requiredField" for="date">
                                                Date
                                                <span class="asteriskField">
                                                *
                                                </span>
                                                </label>
                                                <div class="col-md-12 form-horizontal">
                                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest" >
                                                    
                                                        <input class="datetimepicker-input form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" type="text" value="{{$userRequme->dob}}" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                @if ($errors->has('date_of_birth'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label class="col-md-12 control-label">Gender:</label>
                                                <div class="col-md-12">
                                                    <select id="inputState" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                                        <option selected value="{{$userRequme->gender}}">{{$userRequme->gender}}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                    @if ($errors->has('gender'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('gender') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                    <label class="col-md-12 control-label">Email:</label>
                                                    <div class="col-md-12">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$userRequme->user_email}}" type="text" placeholder="Email">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="col-md-12 control-label">Email 2:</label>
                                                    <div class="col-md-12">
                                                    <input class="form-control{{ $errors->has('email2') ? ' is-invalid' : '' }}" name="email2" value="{{$userRequme->user_email2}}" type="text" placeholder="Email">
                                                    @if ($errors->has('email2'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email2') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                            <div class="form-group col-md-6 ">
                                                <label class="col-md-12 control-label">Religion:</label>
                                                <div class="col-md-12">
                                                    <select id="inputState" class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion">
                                                        <option selected value="{{$userRequme->religion}}">{{$userRequme->religion}}</option>
                                                        <option value="islam">Islam</option>
                                                        <option value="hinduism">Hinduism</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                    @if ($errors->has('religion'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('religion') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label class="col-md-12 control-label">Marital Status:</label>
                                                <div class="col-md-12">
                                                   <select id="inputState" class="form-control{{ $errors->has('marital_status') ? ' is-invalid' : '' }}" name="marital_status">
                                                        <option selected value="{{$userRequme->marital_status}}">{{$userRequme->marital_status}}</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                    @if ($errors->has('marital_status'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('marital_status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-md-8 col-md-offset-5">
                                                    <input type="submit" class="btn btn-success" value="Update" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End personnel information -->
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <div class="card">
                            <!-- Card header -->
                            <form method="post" action="{{route('edit.cv.address.submit', $userRequme->id)}}">
                                @csrf
                                <div class="card-header" role="tab" id="headingTwo2">
                                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#adcollapseTwo2"
                                    aria-expanded="false" aria-controls="adcollapseTwo2">
                                    <h5 class="mb-0">
                                      Address Details <i class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                  </a>
                                </div>

                                <!-- Card body -->
                                <div id="adcollapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                                  <div class="card-body">
                                    
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6 ">
                                                <label class="col-md-12 control-label">Present Address:</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control{{ $errors->has('paresent_address') ? ' is-invalid' : '' }}" name="paresent_address" id="" cols="35" >{{$userRequme->paresent_address}}</textarea>

                                                    @if ($errors->has('paresent_address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('paresent_address') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 ">
                                                <label class="col-md-12 control-label">Parmanent Address:</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="parmanent_address" id="" cols="35" >{{$userRequme->parmanent_address}}</textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <div class="col-md-8 col-md-offset-5">
                                                    <input type="submit" class="btn btn-success" value="Update" />
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                            </form>
                            @endforeach
                        </div>
                        <!-- Accordion card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingThree3">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#crcollapseThree3"
                                aria-expanded="false" aria-controls="crcollapseThree3">
                                <h5 class="mb-0">
                                  Application Information & Career Summary <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                              </a>
                            </div>
                            <!-- Card body -->
                            <div id="crcollapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        @foreach($userCareer as $career)
                                        <form action="{{route('edit.cv.careerinfo.submit', $career->id)}}" method="post">
                                            @csrf
                                            <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <label class="col-md-12 control-label">Objective :</label>
                                                <div class="col-md-12">
                                                    <textarea name="objective" id="" class="form-control" cols="10" rows="3" >{{$career->objective}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label class="col-md-12 control-label">Present Salary:</label>
                                                <div class="col-md-12">
                                                    <input class="form-control" value="{{$career->present_salary}}" name="present_salary" type="number" placeholder="Present Salary">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-md-12 control-label">Expected Salary:</label>
                                                <div class="col-md-12">
                                                    <input class="form-control" value="{{$career->expected_salary}}" name="expected_salary" type="number" placeholder="Expected Salary">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 form-group">
                                                <label class="col-md-12 control-label">Career Summary:</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="career_summary">{{$career->career_summary}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="col-md-12 control-label">Special Qualification:</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="special_quality">{{$career->special_quality}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-md-12 control-label">Looking for (Job Level):</label>
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="job_lavel" value="Entry Level">Entry Level
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="job_lavel" value="Mid Level">Mid Level
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="job_lavel" value="Top Level">Top Leve
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-md-8 col-md-offset-5">
                                                    <input type="submit" class="btn btn-success" value="Update" />
                                                </div>
                                            </div>
                                            </div>
                                        </form>
                                        @endforeach
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        
                    </div>
                    <!-- Accordion wrapper -->
                </div>