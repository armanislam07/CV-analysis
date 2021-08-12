@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12 job-preview">
                    <div class="right job-summary">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <i class="fa fa-eye"></i> View Resume</div>
                            
                            <div class="panel-body">
                                @if(\Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ \Session::get('message')}}
                                    </div>
                                @endif
                                <p>Here you will get a detailed view of your resume and you can download your resume from Download Resume option.</p>
                                @foreach($resumes as $resume)
                                <h3>Downlode: 
                                    <!-- <a href=""><i class="fa fa-file-word-o"></i></a> -->
                                    <a href="{{route('view.cv.download', $resume->id)}}"><i class="fa fa-file-pdf-o"></i></a>
                                </h3>
                                @endforeach
                                @foreach($resumes as $resume)
                                <div class="user_des">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h2 style="color: darkblue;">{{$resume->first_name}} {{$resume->last_name}}</h2>
                                                <small>Address : {{$resume->paresent_address}}</small><br>
                                                <small>Mobile No 1 : {{$resume->mobile_number}}</small><br>
                                                <small>Mobile No 2 : {{$resume->mobile_number2}}</small><br>
                                                <small>e-mail : {{$resume->user_email}}</small>
                                            </div>  
                                            <div class="col-md-4">
                                                <div class="user_des_img">
                                                    <img src="/images/{{$resume->avatar}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach($resumes as $resume)
                                <div class="user_des">
                                    <h6>Career Objective:</h6>
                                    <p>{{$resume->objective}}</p>
                                </div>
                                @endforeach
                                <div class="user_des">
                                    <h6>Career Summary:</h6>
                                    <p>{{$resume->career_summary}}</p>
                                    
                                </div>
                                <div class="user_des">
                                    <h6>Special Qualification:</h6>
                                    <p>{{$resume->special_quality}}</p>
                                </div> 
                                <div class="user_des">
                                    <h6>Employment History:</h6>
                                    
                                    <?php $i = 1;?>
                                    @foreach($experiences as $exp)
                                    <table>                              
                                        <thead>
                                            <tr>
                                                
                                                <th >Total Year of Experience : {{$exp->exp_from_date->diffForHumans()}}</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="90%" style="text-align: right;" >{{$i}}. &nbsp&nbspEmployment Preode:</td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </tbody>
                                    </table>
                                    @endforeach
                                </div>
                                <div class="user_des">
                                    <h6>Academic Qualification:</h6>

                                    <table border="1" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666;word-break: break-all;">
                                        <tbody>
                                            <tr class="BDJNormalText02">
                                                <td width="20%" align="center"><strong>Exam Title</strong></td>
                                                <td width="20%" align="center"><strong>Concentration/Major</strong></td>
                                                <td width="20%" align="center"><strong>Institute</strong></td>
                                                <td width="12.5%" align="center"><strong>Result</strong></td>
                                                <td width="12.5%" align="center"><strong>Pas.Year</strong></td>
                                                <td width="15%" align="center"><strong>Duration</strong></td>
                                            </tr>
                                            @foreach($educations as $resume)
                                            <tr class="BDJNormalText02">
                                                <!--Exam Title:-->
                                                <td width="20%" align="center">
                                                {{$resume->exam_title}}
                                                &nbsp;
                                                </td>
                                                <!--Concentration/Major:-->
                                                <td width="20%" align="center">
                                                {{$resume->subject}}
                                                &nbsp;
                                                </td>
                                                <!--Institute:-->
                                                <td width="20%" align="center" >
                                                {{$resume->institute}}  
                                                &nbsp;              
                                                </td>
                                                <!--Result:-->
                                                <td width="12.5%" align="center">
                                                {{$resume->result}}
                                                &nbsp;                  
                                                </td>
                                                <!--Passing Year:-->
                                                
                                                <td width="12.5%" align="center">
                                                {{$resume->pass_year}}
                                                &nbsp;
                                                </td>
                                                <!--Duration:-->
                                                <td width="15%" align="center">
                                                {{$resume->duration}}
                                                &nbsp;                 
                                                </td> 
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <div class="user_des">
                                    <h6>Training Summary:</h6>
                                    <table border="1" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666;word-break: break-all;">
                                        <tbody>
                                            <tr class="BDJNormalText02">
                                                <td width="20%" align="center"><strong>Training Title</strong></td>
                                                <td width="20%" align="center"><strong>Topic</strong></td>
                                                <td width="20%" align="center"><strong>Institute</strong></td>
                                                <td width="12%" align="center"><strong>Country</strong></td>
                                                <td width="10%" align="center"><strong>Location</strong></td>
                                                <td width="8%" align="center"><strong>Year</strong></td>
                                                <td width="10%" align="center"><strong>Duration</strong></td>
                                            </tr>
                                            @foreach($training as $trainings)

                                            <tr class="BDJNormalText02">
                                                <!--Exam Title:-->
                                                <td width="20%" align="center">
                                                {{$trainings->traning_title}}
                                                &nbsp;
                                                </td>
                                                <!--Concentration/Major:-->
                                                <td width="20%" align="center" >
                                                {{$trainings->topic}}
                                                &nbsp;
                                                </td>
                                                <!--Institute:-->
                                                <td width="20%" align="center">
                                                {{$trainings->institute}}
                                                 
                                                &nbsp;              
                                                </td>
                                                <!--Result:-->
                                                <td width="12%" align="center">
                                                {{$trainings->country}}
                                                  
                                                &nbsp;                  
                                                </td>
                                                <!--Passing Year:-->
                                                
                                                <td width="10%" align="center">
                                                {{$trainings->location}}
                                                
                                                &nbsp;
                                                </td>
                                                <td width="8%" align="center">
                                                {{$trainings->pass_year}}
                                                
                                                &nbsp;                 
                                                </td>
                                                <td width="10%" align="center">
                                                {{$trainings->duration}}
                                                
                                                &nbsp;                 
                                                </td>        
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="user_des">
                                    <h6>Professional Qualification:</h6>
                                    <table border="1" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666;word-break: break-all;">
                                        <tbody>
                                            <tr class="BDJNormalText02">
                                                <td width="25%" align="center"><strong>Certification</strong></td>
                                                <td width="25%" align="center"><strong>Institute</strong></td>
                                                <td width="25%" align="center"><strong>Location</strong></td>
                                                <td width="12.5%" align="center"><strong>From</strong></td>
                                                <td width="12.5%" align="center"><strong>To</strong></td>
                                            </tr>
                                            @foreach($proquality as $quality)
                                            <tr class="BDJNormalText02">
                                                <!--Exam Title:-->
                                                <td width="25%" align="center">
                                                {{$quality->certificat}}
                                                &nbsp;
                                                </td>
                                                <!--Concentration/Major:-->
                                                <td width="25%" align="center" >
                                                {{$quality->institute}}
                                                &nbsp;
                                                </td>
                                                <!--Institute:-->
                                                <td width="25%" align="center">
                                                {{$quality->location}} 
                                                &nbsp;              
                                                </td>
                                                <!--Result:-->
                                                <td width="12.5%" align="center">
                                                {{$quality->pass_year}} 
                                                &nbsp;                  
                                                </td>
                                                <!--Passing Year:-->
                                                
                                                <td width="12.5%" align="center">
                                                {{$quality->duration}}
                                                &nbsp;
                                                </td>       
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="user_des">
                                    <h6>Career and Application Information:</h6>
                                    @foreach($resumes as $resume)
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                        <tbody>
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;">Looking For</td>
                                                <td width="2%" align="center">:</td>
                                                <td width="66%" align="left">
                                                {{$resume->job_lavel}}
                                                </td>
                                            </tr><!-- 
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;">Available  For</td>
                                                <td width="2%" align="center">:</td>
                                                <td width="66%" align="left">
                                                
                                                </td>
                                            </tr> -->
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;">Present Salary</td>
                                                <td width="2%" align="center">:</td>
                                                <td width="66%" align="left">{{$resume->present_salary}}</td>
                                            </tr>
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;">Expected Salary</td>
                                                <td width="2%" align="center">:</td>
                                                <td width="66%" align="left">{{$resume->expected_salary}}</td>
                                            </tr>
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;">Preferred  Job Category</td>
                                                <td width="2%" align="center">:</td>
                                                <td width="66%" align="left">
                                                IT/Telecommunication, Graphic Designer
                                                </td>
                                            </tr>
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;">Preferred  District </td>
                                                <td width="2%" align="center">:</td>
                                                <td width="66%" align="left">
                                                Cumilla, Dhaka          
                                                </td>
                                            </tr>        
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;">Preferred  Country </td>
                                                <td width="2%" align="center">:</td>
                                                <td width="66%" align="left">
                                                India                          
                                                </td>
                                            </tr>
                                            <tr class="BDJNormalText03">
                                                <td width="32%" align="left" style="padding-left:5px;" valign="top">Preferred  Organization Types</td>
                                                <td width="2%" align="center" valign="top">:</td>
                                                <td width="66%" align="left">
                                                Web Media/Blog
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                    @endforeach
                                </div>
                                <div class="user_des">
                                    <h6>Language Proficiency:</h6>
                                    <table border="1" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666;word-break: break-all;">
                                        <tbody>
                                            <tr class="BDJNormalText02">
                                                <td width="25%" align="center"><strong>Language</strong></td>
                                                <td width="25%" align="center"><strong>Reading</strong></td>
                                                <td width="25%" align="center"><strong>Writing</strong></td>
                                                <td width="25%" align="center"><strong>Speaking</strong></td>
                                            </tr>
                                            @foreach($languages as $language)
                                            <tr class="BDJNormalText02">
                                                <!--Exam Title:-->
                                                <td width="25%" align="center">
                                                {{$language->language}} 
                                                &nbsp;
                                                </td>
                                                <!--Concentration/Major:-->
                                                <td width="25%" align="center" >
                                                {{$language->reading}}
                                                &nbsp;
                                                </td>
                                                <!--Institute:-->
                                                <td width="25%" align="center">
                                                {{$language->writing}} 
                                                &nbsp;              
                                                </td>
                                                <!--Result:-->
                                                <td width="25%" align="center">
                                                {{$language->speaking}} 
                                                &nbsp;                  
                                                </td>     
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="user_des">
                                    <h6>Personal Details:</h6>
                                    @foreach($resumes as $resume)
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="word-break: break-all;">
                                        
                                        <tbody>
                                            <tr class="BDJNormalText03">
                                                <td width="22%" align="left" style="padding-left:5px;">Father's Name </td>
                                                <td width="2%" align="center">:</td>
                                                <td width="76%" align="left">
                                                {{$resume->father_name}}
                                                </td>
                                            </tr>
                                    <!--Mothers Name:-->
                                            <tr class="BDJNormalText03">
                                                <td width="22%" align="left" style="padding-left:5px;">Mother's Name </td>
                                                <td width="2%" align="center">:</td>
                                                <td width="76%" align="left">
                                                {{$resume->mother_name}}
                                                </td>
                                            </tr>
                                    <!--Date of Birth:-->
                                            <tr class="BDJNormalText03">
                                                <td width="22%" align="left" style="padding-left:5px;">Date  of Birth</td>
                                                <td width="2%" align="center">:</td>
                                                <td width="76%" align="left">
                                                 {{$resume->dob}}    
                                                </td>
                                            </tr>
                                            <!--Gender:-->
                                            <tr class="BDJNormalText03">
                                                <td width="22%" align="left" style="padding-left:5px;">Gender</td>
                                                <td width="2%" align="center">:</td>
                                                <td width="76%" align="left">
                                                {{$resume->gender}}
                                                </td>
                                            </tr>
                                    <!--Marital Status:-->
                                            <tr class="BDJNormalText03">
                                                <td width="22%" align="left" style="padding-left:5px;">Marital  Status </td>
                                                <td width="2%" align="center">:</td>
                                                <td width="76%" align="left">
                                                {{$resume->marital_status}}
                                                </td>
                                            </tr>
                                    <!--Nationality:-->
                                            <tr class="BDJNormalText03">
                                                <td align="left" style="padding-left:5px;">Nationality</td>
                                                <td align="center">:</td>
                                                <td align="left">
                                                {{$resume->nationality}}
                                                </td>
                                            </tr>
                                    
                                            <tr class="BDJNormalText03">
                                                <td align="left" style="padding-left:5px;">National Id No.</td>
                                                <td align="center">:</td>
                                                <td align="left">
                                                {{$resume->nid_no}}
                                                </td>
                                            </tr>
                                    
                                    <!--Religion:-->
                                    
                                            <tr class="BDJNormalText03">
                                                <td align="left" style="padding-left:5px;">Religion</td>
                                                <td align="center">:</td>
                                                <td align="left">
                                                {{$resume->religion}}
                                                </td>
                                            </tr>
                                    
                                    <!--Permanent Address:-->
                                    
                                    <!--Current Location:-->
                                            <tr class="BDJNormalText03">
                                                <td align="left" style="padding-left:5px;">Current  Location</td>
                                                <td align="center">:</td>
                                                <td align="left">           
                                                Dhaka           
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach
                                </div>
                                <div class="user_des">
                                    <h6>Reference (s):</h6>
                                    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="word-break: break-all;">
                                        <tbody>
                                            @foreach($references as $reference)
                                            <tr class="BDJNormalText03">
                                            <td width="22%" align="left" style="padding-left:5px;">Name </td>
                                            <td width="2%" align="center">:</td>
                                            <td width="35%" align="left">
                                            {{ $reference->name}}
                                            &nbsp;
                                            </td>
                                            <td width="41%" align="left" style="padding-left: 10px;"></td>
                                        </tr>
                                        <tr class="BDJNormalText03">
                                            <td width="22%" align="left" style="padding-left:5px;">Organization</td>
                                            <td width="2%" align="center">:</td>
                                            <td width="35%" align="left">
                                            {{ $reference->organization}}
                                            &nbsp;
                                            </td>
                                            <td width="41%" align="left" style="padding-left: 10px;"></td>
                                        </tr>
                                        <tr class="BDJNormalText03">
                                            <td width="22%" align="left" style="padding-left:5px;">Designation</td>
                                            <td width="2%" align="center">:</td>
                                            <td width="35%" align="left">
                                            {{ $reference->designation}}
                                            &nbsp;
                                            </td>
                                            <td width="41%" align="left" style="padding-left: 10px;"></td>
                                        </tr>
                                        <tr class="BDJNormalText03">
                                            <td align="left" style="padding-left:5px;">Mobile</td>
                                            <td align="center">:</td>
                                            <td align="left">
                                            {{ $reference->mobile}}
                                            &nbsp;
                                            </td>
                                            <td align="left" style="padding-left: 10px;"></td>
                                        </tr>
                                        <tr class="BDJNormalText03">
                                            <td align="left" style="padding-left:5px;">E-Mail</td>
                                            <td align="center">:</td>
                                            <td align="left">
                                            {{ $reference->email}}
                                            &nbsp;
                                            </td>
                                            <td align="left" style="padding-left: 10px;"></td>
                                        </tr>
                                        <tr class="BDJNormalText03">
                                            <td align="left" style="padding-left:5px;">Relation</td>
                                            <td align="center">:</td>
                                            <td align="left">
                                            {{ $reference->relation}}
                                            &nbsp;
                                            </td>
                                            <td align="left" style="padding-left: 10px;"></td>
                                        </tr>
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
