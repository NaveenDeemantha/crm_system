<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Payment - {{ $invoice->invoice_number }}</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .invoice-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .payment-form {
            max-width: 500px;
            margin: 0 auto;
        }
        #card-element {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background: white;
        }
        .StripeElement--focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .StripeElement--invalid {
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Invoice Payment</h3>
                    </div>
                    <div class="card-body">
                        <div class="invoice-details">
                            <h4>Invoice Details</h4>
                            <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
                            <p><strong>Title:</strong> {{ $invoice->title }}</p>
                            <p><strong>Description:</strong> {{ $invoice->description }}</p>
                            <p><strong>Amount:</strong> LKR {{ number_format($invoice->amount, 2) }}</p>
                            <p><strong>Due Date:</strong> {{ $invoice->due_date->format('Y-m-d') }}</p>
                        </div>

                        <form id="payment-form" class="payment-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="card-element">Credit or debit card</label>
                                <div id="card-element"></div>
                                <div id="card-errors" class="text-danger mt-2" role="alert"></div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="submit-button">
                                Pay LKR {{ number_format($invoice->amount, 2) }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');
        const cardErrors = document.getElementById('card-errors');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            submitButton.disabled = true;

            try {
                const {token, error} = await stripe.createToken(card);
                
                if (error) {
                    cardErrors.textContent = error.message;
                    submitButton.disabled = false;
                } else {
                    const response = await fetch('/payment/process', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            token: token.id,
                            invoice_id: '{{ $invoice->id }}',
                            amount: '{{ $invoice->amount }}'
                        })
                    });

                    const result = await response.json();

                    if (result.success) {
                        window.location.href = '/payment/success';
                    } else {
                        cardErrors.textContent = result.message;
                        submitButton.disabled = false;
                    }
                }
            } catch (error) {
                cardErrors.textContent = 'An error occurred. Please try again.';
                submitButton.disabled = false;
            }
        });
    </script>
</body>
</html>