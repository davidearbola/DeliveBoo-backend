{{-- <x-mail::message>

    ciao
    ciao {{ $order[restaurant[name }},

    hai ricevuto un ordine da: {{ $order[name }}.
    Contatti:
    {{ $order[phone }}
    {{ $order[email }}
    {{ $order[address }}

    Riepilogo ordine:
    @foreach ($order[products as $product)
        - {{ $product[name }} x {{ $product[quantity }}
    @endforeach

</x-mail::message> --}}
<!DOCTYPE html>

<head>
    <title>Nuovo ordine</title>
</head>

<body>
    {{-- <p>ciao {{ $order[restaurant][name] }},</p> --}}
    <p>hai ricevuto un ordine da: {{ $order['name'] }}.</p>
    <p>Contatti:</p>
    <ul>
        <li>{{ $order['phone'] }}</li>
        <li> {{ $order['email'] }}</li>
        <li>{{ $order['address'] }}</li>
    </ul>
    <p>Riepilogo ordine:</p>
    <ul>
        @foreach ($order['products'] as $product)
            <li>{{ $product['name'] }} x {{ $product['quantity'] }}</li>
        @endforeach
    </ul>
</body>

</html>
