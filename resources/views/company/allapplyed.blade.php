@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">     
        <div class="col-md-12 card">
            <div class="col-md-12 job-preview">
                <div class="right job-summary">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <i class="fa fa-eye"></i> All Apply CV </div>
                      
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
                                            <th width="10%">CV</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                  <tbody>
                                      @foreach($total_applyers as $key => $applyer)
                                      <tr>
                                          <td>{{$i}}</td>
                                          <td>{{$applyer->job_title}}</td>
                                          <td>{{$applyer->first_name}} {{$applyer->last_name}}</td>
                                          <td>{{$applyer->user_email}}</td>
                                          <td>{{$applyer->mobile_number}}</td>
                                          <td>{{$applyer->paresent_address}}</td>
                                          <td>
                                              <h3>                                       
                                                <a href="{{route('view.cv.download',$applyer->user_id)}}"><i class="fa fa-file-pdf-o"></i></a>
                                            </h3>
                                          </td>
                                          <td width="30%">
                                            <a href="" class="text-primary"><i class="fa fa-check"></i></a>||
                                            <a href="" class="text-danger"><i class="fa fa-minus"></i></a>
                                          </td>
                                          <!-- <td>
                                            <a href="" class="btn btn-danger"><i class="fa fa-remove"></i></a>
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
@endsection
