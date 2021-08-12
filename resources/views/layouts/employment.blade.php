<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <!--Accordion wrapper-->
    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
        <!-- Accordion card -->
        <div class="card">
                <!-- Card header -->
            <div class="card-header" role="tab" id="headingOne1">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#EmpcollapseOne1" aria-expanded="true"
                    aria-controls="EmpcollapseOne1">
                <h5 class="mb-0">
                    Employment  <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
                </a>
            </div>
                <!-- Card body -->
			
            <div id="EmpcollapseOne1" class="collapse show " role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                <!-- Insert Job Expreance -->
				<div class="card-body">
                <div class="row">
                <div class="addexpreance col-md-12">
                                
                    <form name="expreance" method="post" action="{{route('insert.cv.expreance.submit')}}"> @csrf                                              
                    <div class="card">
                        <div class="card-body">
                            
                            <h4 class="card-title">Employment History </h4>
                            <div class="row">
                                    <div class="expreance-form row">
                                        <div class="col-md-6 form-group">
                                             <label class="col-md-12 ontrol-label">Company Name:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="company_name" type="text" placeholder="Company Name" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                             <label class="col-md-12 ontrol-label">Company Business:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="company_business" type="text" placeholder="Company Business" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                             <label class="col-md-12 ontrol-label">Designation:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="designation" type="text" placeholder="Designation" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                             <label class="col-md-12 ontrol-label">Department:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="department" type="text" placeholder="Department" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                             <label class="col-md-12 ontrol-label">Company Location:</label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="company_location" type="text" placeholder="Company Location" >
                                            </div>
                                        </div>
                                                                         
                                        <div class="col-md-6 form-group">
                                            <label class="col-md-12 ontrol-label" for="date">Experence:</label>
                                        
                                            <div class="row">
                                                <div class="input-group date col-md-6" id="datetimepicker2" data-target-input="nearest">
                                                    <input type="text" name="form_experience" class="form-control datetimepicker-input" data-target="#datetimepicker2" data-toggle="datetimepicker"/>
                                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                <div class="input-group date col-md-6" id="datetimepicker3" data-target-input="nearest">
                                                    <input type="text" name="to_experience" id="myText" class="form-control datetimepicker-input" data-target="#datetimepicker3" data-toggle="datetimepicker"/>
                                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                <input type="checkbox" id="checkMe" name="employment_period_to_checkbox" onclick="disableMyText()"/> Currently Working
                                            
                                            
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-md-12 control-label">Area of Experiences:</label>
                                            <div class="col-md-12">
                                                <div class="row expreance_area">
                                                    <div class="col-md-11">
                                                        <input type="text" class="form-control" name="area_experiences[]">

                                                    </div>
                                                    <a href="#" class="addrow5 btn btn-success col-md-1"><i class="fa fa-plus"></i></a>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12" >                     
                                                        <div class="show5">
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>                               
                                        </div>
                                        <div class="col-md-6 form-group">
                                             <label class="col-md-12 ontrol-label">Responsibilities:</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="responsibilities" placeholder="Responsibilities" ></textarea>
                                            </div>
                                        </div>
                                    <div class="col-md-6 form-group">
                                         <label class="col-md-12 ontrol-label">Experience Department:</label>
                                        <div class="col-md-12">
                                            <input class="form-control" name="experience_keyword" type="text" placeholder="Experience Keyword" >
                                        </div>
                                    </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 ontrol-label"></label>
                                            <div class="col-md-8 col-md-offset-5">
                                                <input type="submit" class="btn btn-success" value="Save" />
                                                <input type="button" class="btn btn-default" value="Close" @click="deleteExpreanceForm(index)" />
                                            </div>
                                        </div>
                                    </div>
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
    <!-- Accordion wrapper -->
</div>