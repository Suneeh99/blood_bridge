@extends('layout')

@section('content')

<div class="form-img">
    <form class="hidden-l" id="form" action="{{ route('register.post') }}" method="post">
        <h1 class="text-center mb-5">Create a New Account</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @csrf
        
        <div id="formData">
            <h4>Personal Details : </h4>
            <div>
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" name="fname" required />

                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lname" required />

                <label for="nic" class="form-label">NIC</label>
                <input type="text" class="form-control" name="nic" required />

                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" 
                       max="{{ (now()->subYears(18))->format('Y-m-d') }}" required />
            </div>
            
            <h4>Contact Details : </h4>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required />

                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" required />

                <label for="contact" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" name="contact" pattern="0[0-9]{9}" 
                       title="Contact number must start with 0 and be 10 digits long" required />
            </div>
            
            <h4>Login Details : </h4>
            <div>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required />
                
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required />
                
                <label for="confirmPass" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPass" required />
            </div>
        </div>
        
        <div class="text-center my-4">
            <button type="submit" class="btn btn-outline-danger" id="btn">Confirm Registration</button>
        </div>
        
        <div class="text-center mt-3">
            <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="link-danger">Sign in</a></p>
        </div>
    </form>
</div>

@endsection
