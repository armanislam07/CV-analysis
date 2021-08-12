@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12 job-preview">
                    <div class="right job-summary">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <i class="fa fa-eye"></i> My Stats</div>
                            
                            <div class="panel-body col-md-12">
                                <div class="row">
                                	<div class="col-md-12 my_stats">
                                		<h3>Welcome to your account!</h3>
                                		<p>Here you can check your detailed states like Online Application,  Shortlisted Jobs etc. Beside My Stats in Edit Resume option you can find all features at a glance to add/update.</p>
                                	</div>
                                	<div class="col-md-12 padding-zero hom-listed">
                                		<ul class="list-group">
											<li class="list-group-item d-flex justify-content-between align-items-center">
											Online Application
											<span class="badge badge-primary badge-pill"><a href="">14</a></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
											Shortlisted Jobs
											<span class="badge badge-primary badge-pill"><a href="">2</a></span>
											</li>
										</ul>
                                	</div>
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
