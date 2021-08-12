@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12 job-preview">
                    <div class="right job-summary">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <i class="fa fa-eye"></i> All Companyes</div>
                            
                            <div class="panel-body col-md-12">
                                <div class="row">
                                  <?php $i = 1;?>
                                  
                                    <table class="table table-borderless justify-content-center">
                                       
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="10%">Logo</th>
                                                <th width="20%">Name</th>
                                                <th width="5%">Mobile</th>
                                                <th width="15%">Email</th>
                                            </tr>
                                        </thead>
                                     
                                      <tbody>
                                          @foreach($allcomps as $key => $comps)
                                          <tr>
                                              <td>{{$i}}</td>
                                              <td><img width="50px" src="/images/company_logo/{{$comps->com_logo}}"></td>
                                              <td>{{$comps->com_name}}</td>
                                              <td>{{$comps->com_cont_Pmobile}}</td>
                                              <td>{{$comps->com_email}}</td>
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
</div>
@endsection
