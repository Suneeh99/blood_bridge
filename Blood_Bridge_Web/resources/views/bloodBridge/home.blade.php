@extends('layout') 

@section('content') 

<section class="home">
    <div class='welcome-img'>
        <div class='text-center hidden-l welcome hidden-l'>
            <div id='welcome-head'>
                <img src="{{ asset('img/logo.png') }}" alt="logo" class='img-fluid d-none d-lg-block'/>
                <h1 class="text-start ms-lg-5 lead">Welcome to the Blood Bridge</h1>
            </div>
            <div class="welcome-body">
                <p class="display-6">"Join the Bridge, Save a Life"</p>
                <p>
                    Blood Bridge is a Blood Donation Management System that helps connect people who want to donate blood with those who organize campaigns. It makes it easy for you to find and join blood donation events, set up your own events, and keep your health records updated with the help of doctors. Healthcare agents can also approve and manage all donations and events. Blood Bridge helps save lives and brings hope to people who need it.
                </p>
                <a class='btn btn-lg btn-outline-danger me-4' id='btn' href="{{ route('process.donate') }}" >Donate Now</a>
                <a class='btn btn-lg btn-outline-danger' id='btn' href="{{ route('process.organize') }}">Organize a Campaign</a>
            </div>                
        </div>
    </div>
    
    <div id="slideshow" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/home/0.png') }}" class="d-block w-100 img-fluid" alt="Slide 1" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/home/1.png') }}" class="d-block w-100 img-fluid" alt="Slide 2" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/home/2.png') }}" class="d-block w-100 img-fluid" alt="Slide 3" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/home/3.png') }}" class="d-block w-100 img-fluid" alt="Slide 4" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/home/4.png') }}" class="d-block w-100 img-fluid" alt="Slide 5" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/home/5.png') }}" class="d-block w-100 img-fluid" alt="Slide 6" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class='service-container hidden-l'>
        <div id='service'>
            <h3 class='display-6 text-uppercase fw-bold'>
                <span class="text-muted">Our Services</span>
            </h3>
            <div class='row text-center' id='service-row'>
                <div class='col-lg-3 col-md-5 col-sm-8 mt-sm-5' id='hover'>
                    <h3 class='mb-3'>Organize a Campaign</h3>
                    <p class="lead">
                        Users can request to organize blood donation campaigns, helping to bring donors and patients together in their communities.
                    </p>
                    <a class='btn btn-lg btn-outline-danger' id='btn' href="{{ route('form.campaign.index') }}">Request Form</a>
                </div>
                <div class='col-lg-3 col-md-5 col-sm-8 mt-sm-5' id='hover'>
                    <h3 class=' mb-3'>View and Enroll in a Campaign</h3>
                    <p class="lead">
                        Easily find and join blood donation campaigns that fit your schedule and location, making it simple to contribute.
                    </p>
                    <a class='btn btn-lg btn-outline-danger ' id='btn' href="{{ route('campaigns') }}">View Campaign List</a>
                </div>
                <div class='col-lg-3 col-md-5 col-sm-8 mt-sm-5' id='hover'>
                    <h3 class='mb-3'>Customize Advertisement</h3>
                    <p class="lead">
                        Customize and manage advertisements for your campaigns to reach a wider audience and attract more donors.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class='about-container hidden-r'>
        <div id='about-us'>
            <h3 class='display-6 text-uppercase fw-bold'>
                <span class="text-muted">About Us</span>
            </h3>
            <div class='row text-center' id='service-row'>
                <div class='col-lg-3 col-md-5 col-sm-8 mt-sm-5' id='hover'>
                    <h3 class='mb-3'>Our Mission</h3>
                    <p class="lead">
                        To save lives by connecting donors with patients in need, ensuring every donation makes a difference.
                    </p>
                </div>
                <div class='col-lg-3 col-md-5 col-sm-8 mt-sm-5' id='hover'>
                    <h3 class=' mb-3'>Our Vision</h3>
                    <p class="lead">
                        A world where every patient in need of blood can find a willing and healthy donor.
                    </p>
                </div>
                <div class='col-lg-3 col-md-5 col-sm-8 mt-sm-5' id='hover'>
                    <h3 class='mb-3'>Our History</h3>
                    <p class="lead">
                        Founded in 2024, Blood Bridge connects donors and organizers, serving thousands.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
