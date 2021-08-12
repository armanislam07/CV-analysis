@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="header-slider">
        <div class="">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                        <img src="{{asset('images/slider2.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/slider3.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="search-sec">
            <div class="container">
                <form action="{{route('search.jobs')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                                    <input type="text" name="keyword" class="form-control search-slt" placeholder="Enter Jobs Title">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                    <select name="city" class="form-control search-slt" id="exampleFormControlSelect1">
                                        <option value="">Select Jobs City</option>
                                        <option value="Any where in Bangladesh">Any where in Bangladesh</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option>Select Jobs City</option>
                                        
                                    </select>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <div class="register-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 looking-text">
                    <h1 class="looking-tilte">Take your tech career to the next level. Join Dice today.</h1>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="register-icons"><i class="fa fa-binoculars" aria-hidden="true"></i></p>
                            <p class="register-text">Get discovered by top employers</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="register-icons"><i class="fa fa-bell" aria-hidden="true"></i></p>
                            <p class="register-text">Receive custom job notifications</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="register-icons"><i class="fa fa-briefcase" aria-hidden="true"></i></p>
                            <p class="register-text">Access quick apply options</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="register-icons"><i class="fa fa-credit-card" aria-hidden="true"></i></p>
                            <p class="register-text">Create personalized salary estimates</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 looking-button">
                    <a href="" class="color-button">Register</a>
                    <a href="" >Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <div class="trending-section">
        <div class="container">
            <div class="row trending-box">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><i class="fa fa-list-ul" aria-hidden="true"></i> BROWSE JOB</h3>
                                
                        </div>
                        <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <ul class="list-unstyled jobs-list">
                                            <li><a href=""><i class="fa fa-external-link"></i> Agile</a></li>

                                            
                                               
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <ul class="list-unstyled jobs-list">
                                            <li data-navtrackregion="Trending Searches on Dice"><a href="">Agile</a></li>
                                                
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <ul class="list-unstyled jobs-list">
                                            <li data-navtrackregion="Trending Searches on Dice"><a href="">Agile</a></li>
                                               
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <ul class="list-unstyled jobs-list">
                                            <li data-navtrackregion="Trending Searches on Dice"><a href="">Agile</a></li>
                                                
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
    <div class="looking-hire">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 looking-text">
                    <h1 class="looking-tilte">Looking to hire instead?</h1>
                    <p class="looking-description">Find great tech talent with customizable solutions from Dice.</p>
                </div>
                <div class="col-sm-12 looking-button">
                    <a href="" >Get Started</a>
                    <a href="" >Employer Sign In</a>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.footer')
 @endsection   