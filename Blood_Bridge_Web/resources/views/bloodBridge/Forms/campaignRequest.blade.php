@extends('layout')

@section('content')
    @if (Auth::check())
        <div class="form-body">
            <form class="hidden-l" id="form" action="{{ route('form.campaign.store') }}" method="POST">
                @csrf
                <h1 class="text-center mb-5">Request a Campaign</h1>
                <div id="formData">
                    <label for="name" class="form-label">Campaign Name</label>
                    <input class='form-control' type="text" id="name" name="name" required />
        
                    <label for="date" class="form-label">Date</label>
                    <input class='form-control' type="date" id="date" name="date" required     
                    min="{{ now()->addDays(2)->format('Y-m-d') }}" />
        
                    <label for="time" class="form-label">Time</label>
                    <input class='form-control' type="time" id="time" name="time" required />
        
                    <label for="location" class="form-label">Location</label>
                    <input class='form-control' type="text" id="location" name="location" required />
        
                    <label for="description" class="form-label">Description</label>
                    <textarea class='form-control' id="message" name="description" required></textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-danger" id='btn'>Submit Request</button>
                </div>
            </form>
        </div>
    @else~
        <script>window.location.href = "{{ route('login') }}";</script>
    @endif
@endsection
