<!DOCTYPE html>

<head>
    <title>Nuovo ordine</title>
</head>

<body>
    {{-- <p>ciao {{ $order[restaurant][name] }},</p> --}}
    <p>hai inviato un ordine</p>

    <p>Riepilogo ordine:</p>
    <ul>
        @foreach ($order['products'] as $product)
            <li>{{ $product['name'] }} x {{ $product['quantity'] }}</li>
        @endforeach
    </ul>
</body>

</html>
