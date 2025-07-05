@extends('layout')

@section('content')


    <style>
        /* .form-body {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        } */
        .form-body h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .alert {
            margin-bottom: 20px;
        }
        #card-element {
            margin-bottom: 15px;
        }
    </style>
    
    <div class="form-body" style="padding: 100px 0px">
        <h2>Payment</h2>
    
        <form action="{{ route('payment.process') }}" method="POST" id="form">
            @csrf
            <div class="form-group">
                <h2>Amount : 2000.00 LKR</h2>
                <input type="hidden" name="campaign_id" value="{{ $campaign_id}}">
                <input type="hidden" name="amount" value="2000.00">
            </div>
            <div class="form-group">
                <label for="card-element">Credit Card</label>
                <div id="card-element" class="form-control">
                </div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger btn-block" id="submit-button">Pay Now</button>
            </div>
        </form>
        
    </div>
    
    
    <script>
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');
    
        var form = document.getElementById('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    console.error(result.error.message);
                } else {
                    var form = document.getElementById('form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
    </script>
    @endsection
