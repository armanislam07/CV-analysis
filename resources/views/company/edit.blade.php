@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="notice">
                <p> </p>
            </div>
            <div class="panel-body">
                @if(count($errors) > 0)
                    <div class="alert alert-danger" >
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        {{ \Session::get('success')}}
                    </div>
                @endif
                @foreach($profile_edit as $profile)

                <form action="{{ route('company.profile.edit.submit', $profile->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        
                            <div class="form-group col-md-6 ">
                                <label class="col-md-12 control-label">Company Name:</label>
                                <div class="col-md-12">
                                    <input class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" type="text" value="{{ $profile->com_name }}" >
                                    @if ($errors->has('company_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <div class="input-group col-md-12">
                                <label class="col-md-12 control-label">Company Logo:</label>
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                <div class="custom-file">
                                    <input name="company_logo" type="file" class="custom-file-input{{ $errors->has('company_logo') ? ' is-invalid' : '' }}" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    @if ($errors->has('company_logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_logo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12 control-label">Contact Person:</label>
                                <div class="col-md-12">
                                    <input class="form-control{{ $errors->has('person_name') ? ' is-invalid' : '' }}" name="person_name" type="text" value="{{ $profile->com_cont_Pname }}">
                                    @if ($errors->has('person_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('person_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12 control-label">Contact Person Mobile:</label>
                                <div class="col-md-12">
                                    <input class="form-control{{ $errors->has('person_number') ? ' is-invalid' : '' }}" name="person_number" type="text" value="{{ $profile->com_cont_Pmobile }}">
                                    @if ($errors->has('person_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('person_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="col-md-12 control-label">Company Email Address:</label>
                                <div class="col-md-12">
                                    <input class="form-control{{ $errors->has('company_email') ? ' is-invalid' : '' }}" name="company_email" type="text" value="{{ $profile->com_email }}">
                                    @if ($errors->has('company_email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-md-12 control-label">Phone Number:</label>
                                <div class="col-md-12">
                                <input class="form-control{{ $errors->has('company_phone') ? ' is-invalid' : '' }}" name="company_phone" type="text" value="{{ $profile->com_number}}">
                                @if ($errors->has('company_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_phone') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 ">
                                <label class="col-md-12 control-label">Business Type:</label>
                                <div class="col-md-12">
                                    
                                    <select class="form-control{{ $errors->has('service_type') ? ' is-invalid' : '' }}" name="service_type" value="{{ old('service_type') }}">
                                        <option disabled selected value>{{ $profile->com_service}}</option>
                                        <option value="Another">Another</option>
                                    </select>
                                    @if ($errors->has('service_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('service_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 ">
                                <label class="col-md-12 control-label">Address:</label>
                                <div class="col-md-12" >
                                    <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="" cols="35" >{{ $profile->com_Haddress }}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="col-md-12 control-label">Sub Office Address: (if)</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="sub_office_address" id="" cols="35">{{ $profile->com_sub_address }}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="col-md-8 col-md-offset-5">
                                    <input type="submit" class="btn btn-primary" />
                                </div>
                            </div>
                        </div>
                </form>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
