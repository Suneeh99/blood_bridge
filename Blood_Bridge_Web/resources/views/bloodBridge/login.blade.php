@extends('layout')

@section('content')

<div class="form-img" id="content">
    @if(session('error'))
        <div class="text-center error alert alert-dismissible bg-danger hidden-r text-light" role="alert" id="alert">
            {{ session('error') }}
            <button type="button" class="ms-5 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form class="hidden-l" id="form" action="{{ route('login.post')}}" method="POST">
        <h1 id="login-topic" class='text-center'>Login Portal</h1>        
        @csrf
        <div id="formData">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" required />
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required />
        </div>
        <div class="text-center my-4">
        <button type="submit" class="btn btn-md-lg btn-outline-danger">Login</button>
        </div>
        <div class="text-center mt-3">
        <p class="text-muted">Don't have an account? <a href="{{ route('register')}}" class="link-danger">Sign up</a></p>
        </div>
    </form>
</div>
@endsection