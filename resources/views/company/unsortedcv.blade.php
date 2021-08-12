@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">     
        <div class="col-md-12 card">
            <div class="col-md-12 job-preview">
                <div class="right job-summary">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <i class="fa fa-eye"></i> Apply Unsorted CV </div>
                      
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
                                      @foreach($applyer_unshort as $unsort)
                                      <tr>
                                          <td>{{$i}}</td>
                                          <td>{{$unsort->job_title}}</td>
                                          <td>{{$unsort->first_name}} {{$unsort->last_name}}</td>
                                          <td>{{$unsort->user_email}}</td>
                                          <td>{{$unsort->mobile_number}}</td>
                                          <td>{{$unsort->paresent_address}}</td>
                                          <td class="progress-bar1" data-percent="{{$unsort->accepted}}" data-duration="1000" data-color="#ccc,red"></td>
                                          <td>
                                              <h3>                                       
                                                <a href="{{route('view.cv.download',$unsort->user_id)}}"><i class="fa fa-file-pdf-o"></i></a>
                                            </h3>
                                          </td>
                                          <td width="30%">
                                            <center><a href="{{route('manual.sortlist', $unsort->id)}}" class="text-primary"><i class="fa fa-user-plus"></i></a></center><!-- ||
                                            <a href="" class="text-danger"><i class="fa fa-minus"></i></a> -->
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
