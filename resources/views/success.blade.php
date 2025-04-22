<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Successful</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        .success-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success-card {
            max-width: 500px;
            text-align: center;
            padding: 2rem;
        }
        .success-icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="card success-card">
            <div class="card-body">
                <div class="success-icon">✓</div>
                <h2 class="card-title">Payment Successful!</h2>
                <p class="card-text">Thank you for your payment. Your invoice has been marked as paid.</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Return to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html> 