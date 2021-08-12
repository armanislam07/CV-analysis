var app = new Vue({
        el: '.addeducation',
        data: {
            educations: [
                
            ]
        },
        methods: {
            addNewEducationForm(){
                this.educations.push({
                    name:''
                    
                })
            },
            deleteEducationForm (index){
              this.educations.splice(index, 1)
            }
        }

        
    });
// var app = new Vue({
//         el: '.addexpreance',
//         data: {
//             expreances: [
                
//             ]
//         },
//         methods: {
//             addNewExpreanceForm(){
//                 this.expreances.push({
//                     name:''
                    
//                 })
//             },
//             deleteExpreanceForm (index){
//               this.expreances.splice(index, 1)
//             }
//         }

//     });
var app = new Vue({
        el: '.training_summary',
        data: {
            training_summarys: [
                
            ]
        },
        methods: {
            addNewExpreanceForm(){
                this.training_summarys.push({
                    name:''
                    
                })
            },
            deleteExpreanceForm (index){
              this.training_summarys.splice(index, 1)
            }
        }

    });
var app = new Vue({
        el: '.proquality',
        data: {
            pro_qualitys: [
                
            ]
        },
        methods: {
            addNewExpreanceForm(){
                this.pro_qualitys.push({
                    name:''
                    
                })
            },
            deleteExpreanceForm (index){
              this.pro_qualitys.splice(index, 1)
            }
        }

    });
var app = new Vue({
        el: '.languagepro',
        data: {
            language_pros: [
                
            ]
        },
        methods: {
            addNewExpreanceForm(){
                this.language_pros.push({
                    name:''
                    
                })
            },
            deleteExpreanceForm (index){
              this.language_pros.splice(index, 1)
            }
        }

    });
var app = new Vue({
        el: '.reference',
        data: {
            references: [
                
            ]
        },
        methods: {
            addNewExpreanceForm(){
                this.references.push({
                    name:''
                    
                })
            },
            deleteExpreanceForm (index){
              this.references.splice(index, 1)
            }
        }

    });
function disableMyText(){  
    if(document.getElementById("checkMe").checked == true){  
      document.getElementById("myText").disabled = true;  
    }else{
    document.getElementById("myText").disabled = false;
    }  
};

$('.addrow').on('click',function(){
    addrow();
    });
function addrow()
    {
        var tr = '<div class="row" ><div class="col-md-11" style="padding-top: 5px;">'+
        '<input type="text" class="form-control" name="job_responsibilities[]" >'+
        '</div>'+
        '<div style="padding-top: 5px;">'+
        '<a href="#" class="btn btn-danger remove" ><i class="fa fa-remove"></i></a>'+
        '</div></div>';
        $('.show').append(tr);        
    };

    $('.remove').live('click',function(){
            $(this).parent().parent().remove();
        });

// additional requirement input box add section
$('.addrow2').on('click',function(){
    addrow2();
    });
function addrow2()
    {
        var tr = '<div class="row" ><div class="col-md-11" style="padding-top: 5px;">'+
        '<input type="text" class="form-control" name="additional_requirements[]">'+
        '</div>'+
        '<div style="padding-top: 5px;">'+
        '<a href="#" class="btn btn-danger remove2" ><i class="fa fa-remove"></i></a>'+
        '</div></div>';
        $('.show2').append(tr);        
    };

    $('.remove2').live('click',function(){
            $(this).parent().parent().remove();
        });
// other_benefits input box add section
$('.addrow3').on('click',function(){
    addrow3();
    });
function addrow3()
    {
        var tr = '<div class="row" ><div class="col-md-11" style="padding-top: 5px;">'+
        '<input type="text" class="form-control" name="other_benefits[]">'+
        '</div>'+
        '<div style="padding-top: 5px;">'+
        '<a href="#" class="btn btn-danger remove3" ><i class="fa fa-remove"></i></a>'+
        '</div></div>';
        $('.show3').append(tr);        
    };

    $('.remove3').live('click',function(){
            $(this).parent().parent().remove();
        });
// experience area input box add section
$('.addrow4').on('click',function(){
    addrow4();
    });
function addrow4()
    {
        var tr = '<div class="row" ><div class="col-md-11" style="padding-top: 5px;">'+
        '<input type="text" class="form-control" name="experience_area[]">'+
        '</div>'+
        '<div style="padding-top: 5px;">'+
        '<a href="#" class="btn btn-danger remove4" ><i class="fa fa-remove"></i></a>'+
        '</div></div>';
        $('.show4').append(tr);        
    };

    $('.remove4').live('click',function(){
            $(this).parent().parent().remove();
        });
// user employment experience area input box add section
$('.addrow5').on('click',function(){
    addrow5();
    });
function addrow5()
    {
        var tr = '<div class="row" ><div class="col-md-11" style="padding-top: 5px;">'+
        '<input type="text" class="form-control" name="area_experiences[]">'+
        '</div>'+
        '<div style="padding-top: 5px;">'+
        '<a href="#" class="btn btn-danger remove5" ><i class="fa fa-remove"></i></a>'+
        '</div></div>';
        $('.show5').append(tr);        
    };

    $('.remove5').live('click',function(){
            $(this).parent().parent().remove();
        });
// Career Summary area input box add section
$('.addrowcs').on('click',function(){
    addrowcs();
    });
function addrowcs()
    {
    var tr = '<div class="row" ><div class="col-md-11" style="padding-top: 5px;">'+
    '<input type="text" class="form-control" name="career_summary[]">'+
    '</div>'+
    '<div style="padding-top: 5px;">'+
    '<a href="#" class="btn btn-danger removecs" ><i class="fa fa-remove"></i></a>'+
    '</div></div>';
    $('.showcs').append(tr);        
};

$('.removecs').live('click',function(){
        $(this).parent().parent().remove();
});
$(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'L'
        });
    });
    $(function () {
        $('#datetimepicker2').datetimepicker({
            format: 'L'
        });
    });
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'L'
        });
    });
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'L'
        });
    });