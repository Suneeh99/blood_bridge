@extends('layout')

@section('content')

<div class="form-body">
    <form class='hidden-l customizeCampaign-form ' id="form" action="{{ route('customize.update') }}" method="POST" >
        @csrf
        
        <h1 class='text-center mb-5'>Customize Campaign</h1>            
        <div id="formData">
            <input type="hidden" name="id" value="{{$campaign->campaign_id}}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$campaign->campaign_name}}" required />
            <label for="location" class="form-label">Location</label>
            <input type="location" class="form-control" name="location" value="{{$campaign->location}}" required />
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" value="{{$campaign->date}}" required />
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" name="time" value="{{$campaign->time}}" required />
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" required>{{$campaign->description}}</textarea>
        </div>
        <div class="text-center my-4">
            <button type="submit" class="btn btn-md-lg btn-outline-danger" id="btn">Update Details</button>
        </div>
    </form>
</div>

@endsection