@extends('layout') 

@section('content')

<div class='process'>
    <h1>Blood Donation Process</h1>
    <div class="img-fluid">
        <img style="height: 200px" src="{{asset('img/donateProcess.png')}}">
    </div>
    <p class='lead hidden-l mx-5'>Welcome to the Blood Donation Process! Your contribution can save lives. Here’s a step-by-step guide on how you can get involved:</p>
    
    <div class="row text-center justify-content-center  hidden-l" id='process-row'>
        <div class="col-md-3">
            <div class="step hidden-l">
                <div class="step-number">1</div>
                <h3 class='mt-md-3'>View Campaign</h3>
                <p>Find and select a blood donation campaign near you.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step hidden-l">
                <div class="step-number">2</div>
                <h3 class='mt-md-3'>Enroll in Campaign</h3>
                <p>Sign up to participate in the selected campaign.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step  hidden-l">
                <div class="step-number">3</div>
                <h3 class='mt-md-3'>Confirm Attendance</h3>
                <p>Confirm your attendance on the day of the campaign.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step  hidden-l">
                <div class="step-number">4</div>
                <h3>Receive Terms & Conditions</h3>
                <p>Review and accept the terms and conditions provided.</p>
            </div>
        </div>
    </div>
    <div class="row text-center hidden-l" id='process-row'>
        <div class="col-md-12">
            <div class="final-step  hidden-l">
                <div class="step-number">5</div>
                <h3 class='mt-md-3'>Donor's Dashboard</h3>
                <p>Check your eligibility status and other details on your dashboard.</p>
            </div>
        </div>
    </div>
    <a class='btn my-4 btn-outline-danger hidden-r' id='btn' href="{{ route('campaigns') }}">View Campaigns</a>
</div>

@endsection