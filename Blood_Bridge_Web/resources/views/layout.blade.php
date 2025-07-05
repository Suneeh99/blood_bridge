<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bridge</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> 
    <script src="https://js.stripe.com/v3/"></script>

</head>
<body style="background-color:#f1dada;">
    @if(session('success'))
        <div class="text-center success alert alert-dismissible bg-success hidden-r text-light" role="alert" id="alert">
            {{ session('success') }}
            <button type="button" class="ms-5 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="text-center error alert alert-dismissible bg-danger hidden-r text-light" role="alert" id="alert">
            {{ session('error') }}
            <button type="button" class="ms-5 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @include('bloodBridge.header.navbar')
    @if(!Route::is('home'))
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('img/bg.mp4')}}" type="video/mp4">
    </video>
    @endif
    @yield('content')
    
    @include('bloodBridge.footer.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer_l = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show-l');
                    } else {
                        entry.target.classList.remove('show-l');
                    }
                });
            });

            const observer_r = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show-r');
                    } else {
                        entry.target.classList.remove('show-r');
                    }
                });
            });

            const hiddenElements_l = document.querySelectorAll('.hidden-l');
            hiddenElements_l.forEach((el) => observer_l.observe(el));

            const hiddenElements_r = document.querySelectorAll('.hidden-r');
            hiddenElements_r.forEach((el) => observer_r.observe(el));

            // Cleanup function to stop observing elements
            return () => {
                hiddenElements_l.forEach((el) => observer_l.unobserve(el));
                hiddenElements_r.forEach((el) => observer_r.unobserve(el));
            };
        });
    document.addEventListener('DOMContentLoaded', function () {
        
        let alert = document.querySelector('.error');
        
        
        if (alert) {
            setTimeout(() => {
                let alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                alertInstance.close();
            }, 9000);
        }
    });

    </script>
</body>
</html>
