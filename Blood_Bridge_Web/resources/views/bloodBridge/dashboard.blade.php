@extends('layout')
@section('content')
<div class='dashboard'>
    @if(session('success'))
        <div class="text-center error alert alert-dismissible bg-success hidden-r text-light px-5" role="alert" id="alert">
            {{ session('success') }}
            <button type="button" class="ms-5 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="text-center error alert alert-dismissible bg-danger hidden-r text-light px-5" role="alert" id="alert">
            {{ session('error') }}
            <button type="button" class="ms-5 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>Welcome to Dashboard</h1>
    <div class='row justify-content-center align-items-center'>
        {{-- Your Profile --}}
        <div class='col-lg-4 col-md-5 col-sm-8 my-4 hidden-l' >
            <div id="hover" class="ms-auto me-auto">
                <h5>Your Profile</h5>
                Name: {{ $user->fname }} {{ $user->lname }}<br>
                NIC: {{ $user->donor->nic }}<br>
                Address: {{ $user->donor->address }}<br>
                Email: {{ $user->donor->email }}<br>
                Contact No: {{ $user->contact}}<br>
            </div>
        </div>
        {{-- Blood donation time --}}
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-r' >
            <div id="hover" class="ms-auto me-auto">
                <h5>Blood Donation Times</h5>
                <p id='emp-text1'>{{ $donationCount ?? 0 }}</p> 
            </div>
        </div>
        {{-- Donation History --}}
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-l' >
            <div id="hover" class="ms-auto me-auto">
                <h5>Donation History</h5>
                @forelse($prevCampaigns as $campaign)
                    <p>{{ $campaign->campaign_name }} | {{ $campaign->date }}</p>
                @empty
                    <p>No completed campaigns found.</p>
                @endforelse
            </div>
        </div>
        {{-- Upcoming Campaign --}}
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-r'>
            <div id="hover" class="ms-auto me-auto">
                <h5>Upcoming Campaigns</h5>
                <a class='btn btn-outline-danger mt-3' id='btn' href="{{ route('campaigns') }}">View Campaigns</a>
            </div>
        </div>
        {{-- OnGoing Enrolled Campaign --}}
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-l'>
            <div id="hover" class="ms-auto me-auto">
                <h5>Ongoing Enrolled Campaign</h5>
                @forelse($ongoingCampaigns as $campaign)
                    <p>{{ $campaign->date }} | {{ $campaign->time }}</p>
                    <p>{{ $campaign->campaign_name}}</p>
                        <a type="submit" href="{{ route('process.checkin.index', $campaign->campaign_id) }}" class='btn btn-outline-danger mt-3' id='btn' >Check In</a>
                @empty
                    <p>No Enrolled campaigns found.</p>
                @endforelse
            </div>
        </div>
        {{-- Campaign Request Form --}}
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-r' >
            <div id="hover" class="ms-auto me-auto">
                <h5>Campaign Request Form</h5>
                @if($ongoingOrgCampaign->isEmpty() && $pendingOrgCampaign->isEmpty() && !$acceptedOrgCampaign)
                <p>If you're going to organize a Blood donation campaign, Click below to submit an Application</p>
                    <a class='btn btn-outline-danger mt-3 ' id='btn' href="{{ route('form.campaign.index') }}">Campaign Request Form</a>
                @else
                    <p>You already have an ongoing or previous campaign.</p>
                @endif
            </div>
        </div>
        {{-- Campaign Request Status --}}
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-l' >
            <div id="hover" class="ms-auto me-auto">
                <h5>Campaign Request Status</h5>
                @forelse($pendingOrgCampaign as $campaign)
                    <p>{{ $campaign->campaign_name}} : {{ $campaign->status}}</p>
                @empty
                    <p>No Requested Campaigns found.</p>
                @endforelse 
            </div>
        </div>
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-r' >
            <div id="hover" class="ms-auto me-auto">
                <h5>Campaign Payments</h5>
                @if($acceptedOrgCampaign)
                    <p>{{ $acceptedOrgCampaign->campaign_name }} is accepted By Healthcare Agent.</p>
                    @if($acceptedOrgCampaign->status === 'accepted')
                            <a type="submit" class="btn btn-outline-danger" id="btn" href="{{ route('payment.index',  $acceptedOrgCampaign->campaign_id) }}">Pay Now</a>
                    @endif
                @else
                    <p>No Accepted Campaigns.</p>
                @endif
            </div>
        </div>
        {{-- Customize Advertisement --}}
        <div class='col-lg-3 col-md-5 col-sm-8 my-4 hidden-r' >
            <div id="hover" class="ms-auto me-auto">
                <h5>Customize Advertisement</h5>
                @forelse($ongoingOrgCampaign as $campaign)
                    <p>{{ $campaign->campaign_name}}</p>
                <a class='btn btn-outline-danger' id='btn' href="{{ route('customize.index', $campaign->campaign_id) }}">Edit Advertisement</a>
                @empty
                    <p>No Ongoing Campaigns found.</p>
                @endforelse 
            </div>
        </div>
    </div>
</div>
@endsection
