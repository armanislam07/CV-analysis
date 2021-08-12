<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!--Accordion wrapper-->
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <!-- Accordion card -->
                        <div class="card">
                                <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne1">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#EducollapseOne1" aria-expanded="true"
                                    aria-controls="EducollapseOne1">
                                <h5 class="mb-0">
                                    Academic Qualification:  <i class="fa  fa-angle-down rotate-icon"></i>
                                </h5>
                                </a>
                            </div>
                                <!-- Card body -->
                            <div id="EducollapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                <div class="card-body">
                                    <?php $i = 1;?>
                                    @foreach($userEducation as $edu)  
                                    <div class="table-responsive " style="padding-top: 15px;">
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <th >Academic {{$i}}</th>
                                                <th style="text-align: right; display: none;"> <a href="" class="btn btn-primary"> Edit </a>
                                                </th>
                                            </tr>
                                        </table>
                                        <!-- Button trigger modal -->
                                        <table class="table table-striped table-bordered">
                                            
                                            <thead>
                                                <tr>
                                                    <th>Exam Title</th>
                                                    <th>Subject</th>
                                                    <th>Institute</th>
                                                    <th>Board</th>
                                                    <th>Result</th>
                                                    <th>Passing Year</th>
                                                    <th>Duration</th>                                                    
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$edu->exam_title}}</td>
                                                        <td>{{$edu->subject}}</td>
                                                        <td>{{$edu->institute}}</td>
                                                        <td>{{$edu->board}}</td>
                                                        <td>{{$edu->result}}</td>
                                                        <td>{{$edu->pass_year}}</td>
                                                        <td>{{$edu->duration}}</td>
                                                    </tr>
                                                </tbody>
                                            </thead>
                                        </table>
                                    </div>   
                                        
                                    <div class="row">                                        
                                        <div class="col-md-12" >
                                            <h5 class="form-control alert-info">Edit Education {{$i}}</h5>
                                        </div>

                                        <div class="col-md-12">
                                            <form action="{{route('edit.cv.education.submit', $edu->id)}}" class="form-horizontal col-md-12" method="post">
                                                @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6 ">
                                                    <label class="col-md-12 control-label">Exam Title:</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{$edu->exam_title}}" name="exam_title" type="text" placeholder="Education Name" >
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-12 control-label">Group/Subject:</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{$edu->subject}}" name="subject" type="text" placeholder="Subject" >
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-12 control-label">Institute:</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{$edu->institute}}" name="institute" type="text" placeholder="Subject" >
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-12 control-label">Board:</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{$edu->board}}" name="board" type="text" placeholder="Board">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                        <label class="col-md-12 control-label">Result</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" value="{{$edu->result}}" name="result" type="text" placeholder="Result" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label class="col-md-12 control-label">Passing Year:</label>
                                                        <div class="col-md-12">
                                                        <input class="form-control" value="{{$edu->pass_year}}" name="pass_year" type="year" placeholder="Passing Year">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label class="col-md-12 control-label">Duration:</label>
                                                        <div class="col-md-12">
                                                        <input class="form-control" value="{{$edu->duration}}" name="duration" type="text" placeholder="Duration">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    <?php $i++;?>
                                    @endforeach
                                    <!-- Education Edit -->
                                                                       
                                    <div class="row">                                        
                                        <!-- Education insert -->
                                        <div class="addeducation col-md-12">
<form method="post" action="{{route('insert.cv.education.submit')}}"> 
    @csrf                                              
<div class="card col-md-12" v-for="(education, index) in educations" id="educationForm">
    <div class="card-body" v-for="value in education">
        <span class="float-right" style="cursor:pointer;" @click="deleteEducationForm(index)">X</span>  
        <h4 class="card-title">School / University </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="education-form row">
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Exam Title:</label>
                        <div class="col-md-7">
                            <!-- <input class="form-control" name="exam_title" type="text" placeholder="Education Name" v-model="education.exam"> -->
                            <select class="form-control" name="exam_title" >
                                <option selected>--Select Exam--</option>
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                                <option value="Diploma">Diploma</option>
                                <option value="BBA">BBA</option>
                                <option value="BSC">BSC</option>
                                <option value="Honours">Honours</option>
                                <option value="BCOM">BCOM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Group/Subject:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="subject" type="text" placeholder="Subject Name" >
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Education Type:</label>
                        <div class="col-md-7">
                            <!-- <input class="form-control" name="exam_title" type="text" placeholder="Education Name" v-model="education.exam"> -->
                            <select class="form-control" name="education_type" >
                                <option selected>--Select Education Type--</option>
                                <option value="Primay">Primay</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Graduation">Graduation</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Institute:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="institute" type="text" placeholder="Institute Name" >
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Board:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="board" type="text" placeholder="Board" >
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Result:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="result" type="text" placeholder="Result" >
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Passing Year:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="pass_year" type="number" placeholder="Passing Year" >
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                         <label class="col-md-5 ontrol-label">Duration:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="duration" type="text" placeholder="Duration" >
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
</div>
</form>
                                            <div class="card-body">
                                                <span class="btn btn-success col-md-3"
                                                @click="addNewEducationForm">Add Education</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <div class="card">
                            <!-- Card header -->
                            
                            <div class="card-header" role="tab" id="headingTwo2">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#tscollapseTwo2"
                                aria-expanded="false" aria-controls="tscollapseTwo2">
                                <h5 class="mb-0">
                                  Training Summary: <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                              </a>
                            </div>
                            <!-- Card body -->
                            <div id="tscollapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                              <div class="card-body">
    <?php $i = 1;?>
        @foreach($userTraining as $tra)  
        <div class="table-responsive " style="padding-top: 15px;">
            <table class="table table-striped table-bordered">
                <tr>
                    <th >Training {{$i}}</th>
                    <th style="text-align: right; display: none;"> <a href="" class="btn btn-primary"> Edit </a>
                    </th>
                </tr>
            </table>
            <!-- Button trigger modal -->
            <table class="table table-striped table-bordered">
                
                <thead>
                    <tr>
                        <th>Training Title</th>
                        <th>Topic</th>
                        <th>Institute</th>
                        <th>Country</th>
                        <th>Location</th>
                        <th>Passing Year</th>
                        <th>Duration</th>                                                    
                    </tr>
                    <tbody>
                        <tr>
                            <td>{{$tra->traning_title}}</td>
                            <td>{{$tra->topic}}</td>
                            <td>{{$tra->institute}}</td>
                            <td>{{$tra->country}}</td>
                            <td>{{$tra->location}}</td>
                            <td>{{$tra->pass_year}}</td>
                            <td>{{$tra->duration}}</td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>   
            
        <div class="row">                                        
            <div class="col-md-12" >
                <h5 class="form-control alert-info">Edit Training {{$i}}</h5>
            </div>

            <div class="col-md-12">
                <form action="{{route('edit.cv.training.submit', $tra->id)}}" class="form-horizontal col-md-12" method="post">
                    @csrf
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label class="col-md-12 control-label">Training Title:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$tra->traning_title}}" name="traning_title" type="text" placeholder="Training Title" >
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-12 control-label">Topic:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$tra->topic}}" name="topic" type="text" placeholder="Topic" >
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-12 control-label">Institute:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$tra->institute}}" name="institute" type="text" placeholder="Subject" >
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-12 control-label">Country:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$tra->country}}" name="country" type="text" placeholder="Country">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-4">
                            <label class="col-md-12 control-label">Location</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{$tra->location}}" name="location" type="text" placeholder="Location" >
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="col-md-12 control-label">Passing Year:</label>
                            <div class="col-md-12">
                            <input class="form-control" value="{{$tra->pass_year}}" name="pass_year" type="year" placeholder="Passing Year">
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="col-md-12 control-label">Duration:</label>
                            <div class="col-md-12">
                            <input class="form-control" value="{{$tra->duration}}" name="duration" type="text" placeholder="Duration">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
        <?php $i++;?>
        @endforeach
                                <div class="row">
                                    <div class="training_summary col-md-12">
                                                    
<form method="post" action="{{route('insert.cv.training.submit')}}"> @csrf                                              
<div class="card" v-for="(training_summary, index) in training_summarys" id="expreanceForm">
    <div class="card-body" v-for="value in training_summary">
        <span class="float-right" style="cursor:pointer;" @click="deleteExpreanceForm(index)">X</span>  
        <h4 class="card-title" style="padding-bottom: 10px;">Training Summary </h4>
        <div class="row">
            <div class="training-form row">
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Training Title:</label>
                    <div class="col-md-7">
                    <input class="form-control" name="traning_title" type="text" placeholder="Training Title" >
                        
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Topic:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="topic" type="text" placeholder="Topic" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Institute:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="institute" type="text" placeholder="Institute Name" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Country:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="country" type="text" placeholder="Country" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Location:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="location" type="text" placeholder="Location" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Passing Year:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="pass_year" type="number" placeholder="Passing Year" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Duration:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="duration" type="text" placeholder="Duration" >
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
                                    <div class="card-body">    
                                        <span class="btn btn-success col-md-3"
                                        @click="addNewExpreanceForm">Add Expreance</span>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingThree3">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#pqcollapseThree3"
                                aria-expanded="false" aria-controls="pqcollapseThree3">
                                <h5 class="mb-0">
                                  Professional Qualification: <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                              </a>
                            </div>
                            <!-- Card body -->
                            <div id="pqcollapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                                <div class="card-body">
        <?php $i = 1;?>
        @foreach($userProfessional as $proqua)  
        <div class="table-responsive " style="padding-top: 15px;">
            <table class="table table-striped table-bordered">
                <tr>
                    <th >Qualification {{$i}}</th>
                    <th style="text-align: right; display: none;"> <a href="" class="btn btn-primary"> Edit </a>
                    </th>
                </tr>
            </table>
            <!-- Button trigger modal -->
            <table class="table table-striped table-bordered">
                
                <thead>
                    <tr>
                        <th>Certification</th>
                        <th>Institute</th>
                        <th>Location</th>
                        <th>Passing Year</th>
                        <th>Duration</th>                                                    
                    </tr>
                    <tbody>
                        <tr>
                            <td>{{$proqua->certificat}}</td>
                            <td>{{$proqua->institute}}</td>
                            <td>{{$proqua->location}}</td>
                            <td>{{$proqua->pass_year}}</td>
                            <td>{{$proqua->duration}}</td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>   
            
        <div class="row">                                        
            <div class="col-md-12" >
                <h5 class="form-control alert-info">Edit Certification {{$i}}</h5>
            </div>

            <div class="col-md-12">
                <form method="post" action="{{route('edit.cv.proquality.submit',$proqua->id)}}" class="form-horizontal col-md-12">
                    @csrf
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label class="col-md-12 control-label">Certification:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$proqua->certificat}}" name="certificat" type="text" placeholder="Certification" >
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-12 control-label">Institute:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$proqua->institute}}" name="institute" type="text" placeholder="Subject" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-4">
                            <label class="col-md-12 control-label">Location</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{$proqua->location}}" name="location" type="text" placeholder="Location" >
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="col-md-12 control-label">Passing Year:</label>
                            <div class="col-md-12">
                            <input class="form-control" value="{{$proqua->pass_year}}" name="pass_year" type="year" placeholder="Passing Year">
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="col-md-12 control-label">Duration:</label>
                            <div class="col-md-12">
                            <input class="form-control" value="{{$proqua->duration}}" name="duration" type="text" placeholder="Duration">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
        <?php $i++;?>
        @endforeach                            
                                    <div class="row">
                                       <div class="proquality col-md-12">
                                                    
<form method="post" action="{{route('insert.cv.proquality.submit')}}"> @csrf                                              
<div class="card" v-for="(pro_quality, index) in pro_qualitys" id="expreanceForm">
    <div class="card-body" v-for="value in pro_quality">
        <span class="float-right" style="cursor:pointer;" @click="deleteExpreanceForm(index)">X</span>  
        <h4 class="card-title" style="padding-bottom: 10px; ">Professional Qualification </h4>
        <div class="row">
            <div class="training-form row">
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Certification:</label>
                    <div class="col-md-7">
                    <input class="form-control" name="certificat" type="text" placeholder="Certification" >
                        
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Institute:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="institute" type="text" placeholder="Institute Name" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Location:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="location" type="text" placeholder="Location" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Passing Year:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="pass_year" type="number" placeholder="Passing Year" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Duration:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="duration" type="text" placeholder="Duration" >
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
                                        <div class="card-body">
                                            <span class="btn btn-success col-md-3"
                                        @click="addNewExpreanceForm">Add Expreance</span>
                                        </div>
                                    </div> 
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingFour4">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#lpcollapsefour"
                                aria-expanded="false" aria-controls="lpcollapsefour">
                                <h5 class="mb-0">
                                  Language Proficiency: <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                              </a>
                            </div>
                            <!-- Card body -->
                            <div id="lpcollapsefour" class="collapse" role="tabpanel" aria-labelledby="headingFour4" data-parent="#accordionEx">
                                <div class="card-body">
        <?php $i = 1;?>
        @foreach($userLanguage as $lang)  
        <div class="table-responsive " style="padding-top: 15px;">
            <table class="table table-striped table-bordered">
                <tr>
                    <th >Language {{$i}}</th>
                    <th style="text-align: right; display: none;"> <a href="" class="btn btn-primary"> Edit </a>
                    </th>
                </tr>
            </table>
            <!-- Button trigger modal -->
            <table class="table table-striped table-bordered">
                
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Reading</th>
                        <th>Writing</th>
                        <th>Speaking</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>{{$lang->language}}</td>
                            <td>{{$lang->reading}}</td>
                            <td>{{$lang->writing}}</td>
                            <td>{{$lang->speaking}}</td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>   
            
        <div class="row">                                        
            <div class="col-md-12" >
                <h5 class="form-control alert-info">Edit Language {{$i}}</h5>
            </div>

            <div class="col-md-12">
                <form action="{{route('edit.cv.language.submit', $lang->id)}}" class="form-horizontal col-md-12" method="post">
                    @csrf
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label class="col-md-12 control-label">Language:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$lang->language}}" name="language" type="text" placeholder="Language" >
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-12 control-label">Reading:</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{$lang->reading}}" name="reading" type="text" placeholder="Reading" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-4">
                            <label class="col-md-12 control-label">Writing</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{$lang->writing}}" name="writing" type="text" placeholder="Writing" >
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="col-md-12 control-label">Speaking Year:</label>
                            <div class="col-md-12">
                            <input class="form-control" value="{{$lang->speaking}}" name="speaking" type="text" placeholder="Speaking">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
        <?php $i++;?>
        @endforeach                                       
                                    <div class="row">
                                        <div class="languagepro col-md-12">
                                                    
<form method="post" action="{{route('insert.cv.language.submit')}}"> @csrf                                              
<div class="card" v-for="(language_pro, index) in language_pros" id="expreanceForm">
    <div class="card-body" v-for="value in language_pro">
        <span class="float-right" style="cursor:pointer;" @click="deleteExpreanceForm(index)">X</span>  
        <h4 class="card-title" style="padding-bottom: 10px; ">Language Proficiency </h4>
        <div class="row">
            <div class="training-form row">
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Language:</label>
                    <div class="col-md-7">
                    <input class="form-control" name="language" type="text" placeholder="Language" >
                        
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Reading:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="reading" type="text" placeholder="Reading" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Writing:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="writing" type="text" placeholder="Writing" >
                    </div>
                </div>
                <div class="col-md-6 form-group">
                     <label class="col-md-5 ontrol-label">Speaking:</label>
                    <div class="col-md-7">
                        <input class="form-control" name="speaking" type="text" placeholder="Speaking" >
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
                                        <div class="card-body">
                                            <span class="btn btn-success col-md-3"
                                        @click="addNewExpreanceForm">Add Expreance</span>
                                        </div>
                                    </div> 
                                           
                                         
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                    </div>
                    <!-- Accordion wrapper -->
                </div>