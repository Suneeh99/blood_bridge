<nav class="navbar navbar-expand-lg navbar-light px-4">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home')}}">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="img-fluid" />
        <h2 class="ms-3 pt-2">Blood Bridge</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('process.donate')}}">Donate Blood</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('process.organize')}}">Organize a Campaign</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('form.contact')}}">Contact Us</a>
            </li>
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard')}}">Dashboard</a>
            </li>
            @endif
        </ul>
        <div class="login-register ms-lg-3">
            @if (Auth::check())
                <a class="btn btn-outline-danger me-3 ms-lg-5" href="{{ route('logout') }}">Logout</a>
            @else
                <a class="btn btn-outline-danger me-3 ms-lg-5" href="{{ route('login') }}">Login</a>
                <a class="btn btn-danger" href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>
</nav>
