@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">     
        <div class="col-md-12 card">
            <div class="col-md-12 job-preview">
                <div class="right job-summary">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <i class="fa fa-eye"></i> Apply Sorted CV </div>
                      
                            <div class="row">
                              <?php $i = 1;?>
                              
                                <table class="table table-borderless justify-content-center">
                                   
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="15%">Job Title</th>
                                            <!-- <th width="5%">Vacancy</th> -->
                                            <th width="15%">Name</th>
                                            <th width="15%">Email</th>
                                            <th width="15%">Mobile</th>
                                            <th width="15%">Maling Address</th>
                                            <th width="15%">Parcentage</th>
                                            <th width="10%">CV</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                  <tbody>
                                      @foreach($applyer_short as $shorted)
                                      <tr>
                                          <td>{{$i}}</td>
                                          <td>{{$shorted->job_title}}</td>
                                          <td>{{$shorted->first_name}} {{$shorted->last_name}}</td>
                                          <td>{{$shorted->user_email}}</td>
                                          <td>{{$shorted->mobile_number}}</td>
                                          <td>{{$shorted->paresent_address}}</td>
                                          <td class="progress-bar1" data-percent="{{$shorted->accepted}}" data-duration="1000" data-color="#ccc,green"></td>
                                          <td>
                                              <h3>                                       
                                                <a href="{{route('view.cv.download',$shorted->user_id)}}"><i class="fa fa-file-pdf-o"></i></a>
                                            </h3>
                                          </td>
                                          <td width="40%">
                                            <!-- <a href="" class="text-primary"><i class="fa fa-check"></i></a>|| -->
                                           <center> <a href="{{route('manual.unsortlist', $shorted->id)}}" class="text-danger"><i class="fa fa-user-times" ></i></a></center>
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
    </div>
</div>
@endsection
