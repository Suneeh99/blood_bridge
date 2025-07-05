@extends('layout')

@section('content')

<div class='process'>
    <h1>{{ $campaign_name }}</h1>
    <div class="img-fluid">
        <img style="height: 200px" src="{{asset('img/checkInProcess.png')}}">
    </div>
    <div class="row text-center justify-content-center  hidden-l" id='process-row'>
        <div class="col-md-4">
            <div class="step hidden-l">
                <div class="step-number">1</div>
                <h3 class='mt-md-3'>Fill the Application</h3>
                @if($existForm)
                    <p>You have submitted the eligibility form.</p>
                @else
                    <a type="submit" href="{{ route('eligibilityForm.index', $campaign_name) }}" class="mt-3 btn btn-outline-danger" id='btn'>Eligibility Form</a>
                @endif
                </div>
        </div>
        @if($existForm)
        @if($eligibility !== null)
            <div class="col-md-4">
                <div class="step hidden-l">
                    <div class="step-number ">2</div>
                    <h3 class='mt-md-3'>Eligiblity Status 01</h3>
                    @if($eligibility->eligibility_1 === 'approved')
                    <p class="text-success">Approved</p>
                @elseif($eligibility->eligibility_1 === 'rejected')
                    <p class="text-danger">Rejected</p>
                    <a class='btn mb-3 btn-outline-danger hidden-r' id='btn' href="{{ route('dashboard') }}">Return to Dashboard</a>
                @else
                    <p>{{ $eligibility->eligibility_1 }}</p>
                @endif

                </div>
            </div>
            @endif
        @endif
        @if($eligibility && $eligibility->eligibility_1 === 'approved')
        <div class="col-md-4">
            <div class="step  hidden-l">
                <div class="step-number ">3</div>
                <h3>Eligibility Status 02</h3>
                @if($eligibility->eligibility_2 === 'approved')
                    <p class="text-success">Approved</p>
                @elseif($eligibility->eligibility_2 === 'rejected')
                    <p class="text-danger">Rejected</p>
                    <a class='btn mb-3 btn-outline-danger hidden-r' id='btn' href="{{ route('process.checkin.reject', $campaign_name) }}">Return to Dashboard</a>
                @else
                    <p>Waiting For Approval</p>
                @endif
            </div>
        </div>
        @endif
    </div>
    @if($eligibility && $eligibility->eligibility_2 == 'approved' )
        <div class="row text-center hidden-l" id='process-row'>
                <div class="col-md-12">
                    <div class="final-step  hidden-l">
                        <div class="step-number">4</div>
                        <h3 class='mt-md-3'>Successfully Donated !!</h3>
                        <p>Thank you for your recent blood donation! Your generosity has made a significant impact and will help save lives. We truly appreciate your support and dedication.</p>
                        <a class='btn mb-3 btn-outline-danger hidden-r' id='btn' href="{{ route('process.checkin.update', $campaign_name) }}">Return to Dashboard</a>
                    </div>
                </div>
            </div>
    @endif
</div>
@endsection