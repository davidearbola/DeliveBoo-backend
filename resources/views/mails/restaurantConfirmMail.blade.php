<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuovo ordine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #4CAF50;
            margin-top: 0;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            padding: 8px 0;
        }

        .section {
            margin-bottom: 20px;
        }

        .section p {
            margin: 0;
            font-size: 16px;
        }

        .highlight {
            font-weight: bold;
            color: #555;
        }

        .footer {
            font-size: 14px;
            color: #777;
            text-align: center;
            margin-top: 20px;
        }

        img {
            background-color: #222;
            height: 4rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nuovo ordine ricevuto!</h1>
        <p>Hai ricevuto un nuovo ordine da <span class="highlight">{{ $order['name'] }}</span>.</p>

        <div class="section">
            <p><strong>Contatti:</strong></p>
            <ul>
                <li><strong>Telefono:</strong> {{ $order['phone'] }}</li>
                <li><strong>Email:</strong> {{ $order['email'] }}</li>
                <li><strong>Indirizzo:</strong> {{ $order['address'] }}</li>
            </ul>
        </div>

        <div class="section">
            <p><strong>Riepilogo ordine:</strong></p>
            <ul>
                @foreach ($order['products'] as $product)
                    <li>{{ $product['name'] }} x {{ $product['quantity'] }}</li>
                @endforeach
            </ul>
            <p><strong>Totale: {{ $order['total_price'] }}€</strong></p>
        </div>

        <div class="footer">
            <img src="{{ asset('images/DeliveBoo-Photoroom.png') }}">
            <p>Grazie per aver scelto il nostro servizio!</p>
        </div>
    </div>
</body>

</html>
