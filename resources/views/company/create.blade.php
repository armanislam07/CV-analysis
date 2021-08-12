@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="notice">
                <p> </p>
            </div>
            <div class="card">
                <!-- @if(count($errors) > 0)
                    <div class="alert alert-danger" >
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                @if(\Session::has('error'))
                    <div class="alert alert-danger" >
                        {{ \Session::get('error')}}
                    </div>
                @endif
                @if(\Session::has('message'))
                    <div class="alert alert-success">
                        {{ \Session::get('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{route('company.profile.submit')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row">
                        {{csrf_field()}}
                        {{-- {{ method_field('PUT') }} --}}
                            <div class="form-group col-md-6 ">
                                <label class="col-md-12 control-label">Company Name:</label>
                                <div class="col-md-12">
                                    <input class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" type="text" value="{{ old('company_name') }}" placeholder="Company Name">
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
                                    <input class="form-control{{ $errors->has('person_name') ? ' is-invalid' : '' }}" name="person_name" type="text" placeholder="Contact Person Name" value="{{ old('person_name') }}">
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
                                    <input class="form-control{{ $errors->has('person_number') ? ' is-invalid' : '' }}" name="person_number" type="text" placeholder="Contact Person Mobile Number" value="{{ old('person_number') }}">
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
                                    <input class="form-control{{ $errors->has('company_email') ? ' is-invalid' : '' }}" name="company_email" type="text" placeholder="Email Address" value="{{ old('company_email') }}">
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
                                <input class="form-control{{ $errors->has('company_phone') ? ' is-invalid' : '' }}" name="company_phone" type="text" placeholder="Phone Number" value="{{ old('company_phone') }}">
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
                                    <!-- <label class="checkbox-inline">
                                        <input type="checkbox" value="CCTV" name="service_type">CCTV
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="Access Control" name="service_type">Access Control
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="Fire" name="service_type">Fire
                                    </label> -->

                                    <select class="form-control{{ $errors->has('service_type') ? ' is-invalid' : '' }}" name="service_type" value="{{ old('service_type') }}">
                                        <option disabled selected value>---Please select---</option>
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
                                    <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="" cols="35" >{{ old('address') }}</textarea>
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
                                    <textarea class="form-control" name="sub_office_address" id="" cols="35" value="{{ old('sub_office_address') }}"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="col-md-8 col-md-offset-5">
                                    <input type="submit" class="btn btn-primary" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>
@endsection
