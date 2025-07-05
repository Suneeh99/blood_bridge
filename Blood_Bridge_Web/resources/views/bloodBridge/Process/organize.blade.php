@extends('layout') 

@section('content')

<div class='process'>
    <h1>Campaign Organizing Process</h1>
    <div class="img-fluid">
        <img style="height: 200px" src="{{asset('img/campaignProcess.png')}}">
    </div>
    <p class='lead hidden-l mx-5'>Want to organize a blood donation campaign? Follow these steps to get started:</p>
    <div class="row text-center justify-content-center hidden-l" id='process-row'>
        <div class="col-md-3">
            <div class="step hidden-l">
                <div class="step-number">1</div>
                <h3 class='mt-md-3'>Fill Request Form</h3>
                <p>Submit a request form to organize a campaign.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step hidden-l">
                <div class="step-number">2</div>
                <h3 class='mt-md-3'>Wait for Approval</h3>
                <p>Your request will be reviewed by healthcare agents.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step hidden-l">
                <div class="step-number">3</div>
                <h3 class='mt-md-3'>Access Dashboard</h3>
                <p>Check the status of your request on your dashboard.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step hidden-l">
                <div class="step-number">4</div>
                <h3>Create & Customize Ad</h3>
                <p>If approved, create and customize your campaign advertisement.</p>
            </div>
        </div>
    </div>
    <div class="row text-center hidden-l" id='process-row'>
        <div class="col-md-12">
            <div class="final-step hidden-l">
                <div class="step-number">5</div>
                <h3 class='mt-md-3'>Make Payment</h3>
                <p>Complete the payment process to finalize your campaign.</p>
            </div>
        </div>
    </div>
    <a class='btn my-4 btn-outline-danger hidden-r' id='btn' href="{{ route('form.campaign.index') }}">Request form</a>
</div>

@endsection