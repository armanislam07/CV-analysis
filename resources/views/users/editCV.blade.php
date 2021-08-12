@extends('layouts.master')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-user"></i> Personal</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education/Training</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-briefcase" aria-hidden="true"></i> Employment</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i> Other Information</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                @include('layouts.personal')

                @include('layouts.employment')
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <!--Accordion wrapper-->
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <!-- Accordion card -->
                            @if(\Session::has('error'))
                                <div class="alert alert-danger" >
                                    {{ \Session::get('error')}}
                                </div>
                            @endif
                        <div class="card">
                            
                            @if(\Session::has('message'))
                                <div class="alert alert-success">
                                    {{ \Session::get('message')}}
                                </div>
                            @endif
                                <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne1">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#EmpcollapseOne1" aria-expanded="true"
                                    aria-controls="EmpcollapseOne1">
                                <h5 class="mb-0">
                                    Photography  <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                                </a>
                            </div>
                                <!-- Card body -->
                            <div id="EmpcollapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                <form action="">
                                    <div class="row">
                                        <div class="form-group col-md-6 ">
                                            <div class="input-group col-md-12">
                                            <label class="col-md-12 control-label">Profile Photo:</label>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                                </div>
                                            <div class="custom-file">
                                                <input name="profile_img" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            
                                            <div class="col-md-12">
                                            <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-8 col-md-offset-5">
                                                <input type="submit" class="btn btn-success" value="Update" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <!-- Card header -->
                            
                            <div class="card-header" role="tab" id="headingTwo2">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#rscollapseTwo2"
                                aria-expanded="false" aria-controls="rscollapseTwo2">
                                <h5 class="mb-0">
                                  Reference (s): <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                              </a>
                            </div>
                            <!-- Card body -->
                            <div id="rscollapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                              <div class="card-body">
                                <div class="row">
                                    
                                </div>
                                <div class="row">
                                    <div class="reference col-md-12">
                    
<form name="reference" method="post" action="{{route('insert.cv.reference.submit')}}"> @csrf                                              
<div class="card" v-for="(reference, index) in references" id="expreanceForm">
    <div class="card-body" v-for="value in reference">
        <span class="float-right" style="cursor:pointer;" @click="deleteExpreanceForm(index)">X</span>  
        <h4 class="card-title" style="padding-bottom: 10px; ">Reference (s)</h4>
        <div class="row">
            <div class="training-form row">
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Name:</label>
                    <div class="col-md-7">
                    <input class="form-control" name="name" type="text" placeholder="Name" >
                        
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Organization:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="organization" type="text" placeholder="Organization" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Designation:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="designation" type="text" placeholder="Designation" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Mobile:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="mobile" type="text" placeholder="Mobile" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">E-Mail:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="email" type="text" placeholder="E-Mail" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Relation:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="relation" type="text" placeholder="Relation" >
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="col-md-8 col-md-offset-5">
                        <input type="submit" class="btn btn-success" value="Save" />
                        <input type="button" class="btn btn-default" value="Close" @click="deleteEducationForm(index)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
                                    <span class="btn btn-success col-md-3"
                                    @click="addNewExpreanceForm">Add Expreance</span>
                                    </div> 
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                    </div>
                    <!-- Accordion wrapper -->
                </div>
@include('layouts.education')
                
            </div>
        </div>
    </div>
</div>
</script>
@endsection

