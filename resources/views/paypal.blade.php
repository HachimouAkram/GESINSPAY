<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Integration in Laravel 12</title>
</head>
<body>

    <h2>Pay with PayPal</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <a href="{{ route('paypal.create') }}">
        <button>Pay with PayPal</button>
    </a>

</body>
</html>
