@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="card-body">
                @if(\Session::has('message'))
                <div class="card-header">
                    <div class="alert alert-success">
                        {{ \Session::get('message')}}
                    </div>
                </div>
                @endif
                @if(\Session::has('error'))
                <div class="card-header">
                    <div class="alert alert-denger">
                        {{ \Session::get('error')}}
                    </div>
                </div>
                @endif
                
                @foreach($profileView as $profile)
                <a href="{{route('company.profile.editview', $profile->id )}}">Edit</a>
                <div class="card-header"><img src="/images/company_logo/{{$profile->com_logo}}" class="img-circle" alt="Company Logo" width="70px"><h3 class="text text-success"><strong>{{$profile->com_name}}</strong></h3></div>
                
                <!-- <div class="col-md-12">
                    <img src="/image/{{Auth::guard('company')->user()->avatar}}" style="">
                </div> -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-borderless">
                        <!-- <thead>
                          <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                          </tr>
                        </thead> -->
                        <tbody>
                          <!-- <tr>
                            <td>Company Name</td>
                            <td>{{$profile->com_name}}</td>
                          </tr> -->
                          <tr>
                            <td>Business Type</td>
                            <td>{{$profile->com_service}}</td>
                            <!-- <td>mary@example.com</td> -->
                          </tr>
                          <tr>
                            <td>Contact Person Name</td>
                            <td>{{$profile->com_cont_Pname}}</td>
                            <!-- <td>july@example.com</td> -->
                          </tr>                          
                          <tr>
                            <td>Contact Person Mobile</td>
                            <td>{{$profile->com_cont_Pmobile}}</td>
                            <!-- <td>july@example.com</td> -->
                          </tr>
                          <tr>
                            <td>Company Email</td>
                            <td>{{$profile->com_email}}</td>
                            <!-- <td>july@example.com</td> -->
                          </tr>
                          <tr>
                            <td>Company Phone</td>
                            <td>{{$profile->com_number}}</td>
                            <!-- <td>july@example.com</td> -->
                          </tr>
                          <tr>
                            <td>Office Address</td>
                            <td>{{$profile->com_Haddress}}</td>
                            <!-- <td>july@example.com</td> -->
                          </tr>
                        </tbody>
                      </table>                      
                    @endforeach
                    <form action="{{route('company.profile')}}">
                       {!! $updateProfile !!}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 card">
          <div class="col-md-12 job-preview">
              <div class="right job-summary">
                  <div class="panel panel-default">
                      <div class="panel-heading"> <i class="fa fa-eye"></i> Posted Job Circular</div>
                      
                          <div class="row ">
                            <div class="table-responsive">
                              
                            
                              <?php $i = 1;?>
                              
                              <table class="table table-borderless justify-content-center ">
                                   
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
                                          
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{route('company.applyer.all', $circular->id)}}" class="btn btn-info">All Applyer CV <!-- <span class="strong" style="background-color: red; padding-left: 4px; padding-right: 4px;">3</span> --></a>
                                        </td>
                                        <td>
                                            <a href="{{route('company.applyer.sortedcv',$circular->id)}}" class="btn btn-primary">Sorted CV</a>
                                        </td>
                                        <td>       
                                            <a href="{{route ('company.applyer.unsortedcv',$circular->id)}}" class="btn btn-danger">Unsorted CV</a>
                                        </td>
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
          <div class="row">
              <div class="col-md-3">
                <p>Section 1</p>
              </div>
              <div class="col-md-3">
                <p>Section 2</p>
                
              </div>
              <div class="col-md-3">
                <p>Section 3</p>
                
              </div>
              <div class="col-md-3">
                <p>Section 4</p>
                
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
