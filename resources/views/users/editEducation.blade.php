@extends('layouts.app')

@section('content')
<div class="container">
    
<!-- test Live table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Exam Title</th>
                    <th>Subject</th>
                    <th>Institute</th>
                    <th>Board</th>
                    <th>Result</th>
                    <th>Passing Year</th>
                    <th>Duration</th>
                    <th class="text-center" width="150px">
                        <a href="#" class="create-modal btn btn-success btn-sm">
                            <i class="glyphicon glyphicon-plus" ></i>
                        </a>
                    </th>
                    
                </tr>
                <tbody>
                    
                </tbody>
            </thead>
        </table>
    </div>
    <!-- form create ajax -->
    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="model-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row add">
                            <lavel class="control-lavel col-sm-2" for="exam_title">Exam Title</lavel>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="exam_title" id="exam_title" placeholder="Exam title hear" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="form-group">
                            <lavel class="control-lavel col-sm-2" for="subject">subject</lavel>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject hear" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div> 
                        </div> 
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit" id="add">
                        <span class="glyphicon glyphicon-plus"> Save</span> 
                    </button>
                    <button class="btn btn-danger" type="submit" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remobe"> Save</span> 
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
        $(document).ready(function(){

            fetch_data();

            function fetch_data()
            {
                $.ajax({
                    url:"route('education.fatch_data')",
                    dataType: "json",
                    success:function(data)
                    {
                        var html = '';
                        html += '<tr>';
                        html += '<td contenteditable id="exam_title"></td>';
                        html += '<td contenteditable id="subject"></td>';
                        html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</td></tr>';
                        for(var count=0; count < data.length; count++)
                        {
                            html += '<tr>';
                            html += '<td contenteditable class="column_name" data-column_name="exam_title" id="'+data[count].id+'">'+data[count].exam_title+'</td>';
                            html += '<td contenteditable class="column_name" data-column_name="subject" id="'+data[count].id+'">'+data[count].subject+'</td>';
                            html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';
                        }
                        $('tbody'.html(html));
                    }
                })
            }
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', '.create-modal', function(){
            $('#create').modal('show');
            $('.form-horizontal').show();
            $('.modal-title').text('Add');
        });
    </script>
@endsection
