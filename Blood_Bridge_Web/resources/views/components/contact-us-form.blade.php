<div class="form-body">
    <form class="hidden-l" id="form" action="{{ route('contactus.store') }}" method="POST">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @csrf
        <h1 class='text-center mb-5'>Contact Us</h1>
        <div id="formData">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required />
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required />
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <div class="text-center my-4">
            <button type="submit" class="btn btn-md-lg btn-outline-danger">Send Message</button>
        </div>
        <ul class="list-unstyled text-center" id='contactMethods'>
            <li class='mb-1'> Email: support@bloodbridge.com</li>
            <li class='mb-1'> Contact: (0112) 845 845 </li>
            <li class='mb-1'> Hotline: 8414</li>
            <li class='mb-1'> Address: 42/A High-Level Road, Maharagama</li>
        </ul>
    </form>
</div>
