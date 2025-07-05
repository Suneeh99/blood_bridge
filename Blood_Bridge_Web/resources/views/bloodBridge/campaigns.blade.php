@extends('layout')

@section('content')

<div class="campaigns" id="content">
    
    <h1>Available Campaigns</h1>
    <div class="img-fluid">
        <img style="height: 200px" src="{{asset('img/campaignBG.png')}}">
    </div>
    <!-- Filter Bar -->
    <div class="filter-bar mb-4">
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-outline-danger mx-1" data-letter="all">All</a>
            @foreach($locations as $letter)
                <a href="#" class="btn btn-outline-danger mx-1" data-letter="{{ $letter }}">{{ $letter }}</a>
            @endforeach
        </div>
    </div>

    <!-- Campaigns List -->
    <div class="row justify-content-center" style="width: 90%; margin: 0px auto;">
        @foreach($pendingCampaigns as $campaign)
            <div class="col-xxl-3 col-lg-4 col-md-5 col-sm-8 mt-sm-5 hidden-l campaign-card" 
                data-location="{{ strtoupper(substr($campaign->location, 0, 1)) }}">
                <div id="hover" class="p-5" style="width: 380px">
                    <h4>{{ $campaign->campaign_name }}</h4>
                    <ul type="none">
                        <li>
                            <h6 class="mt-3">{{ $campaign->date }} at {{ $campaign->time }}</h6>
                        </li>
                        <li>
                            Location: {{ $campaign->location }}
                        </li>
                        <li>
                            Organized By: {{ $campaign->organizer->fname }} {{ $campaign->organizer->lname }}
                        </li>
                        <li class="mt-3">
                            {{ $campaign->description }}
                        </li>
                    </ul>
                    <form action="{{ route('campaigns.enroll', $campaign->campaign_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="mt-3 btn btn-outline-danger" id='btn'>Enroll</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- jQuery script for filtering -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-bar a');
        const campaignCards = document.querySelectorAll('.campaign-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const filterLetter = this.getAttribute('data-letter');

                campaignCards.forEach(card => {
                    const locationFirstLetter = card.getAttribute('data-location');
                    if (filterLetter === 'all' || locationFirstLetter === filterLetter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

@endsection
