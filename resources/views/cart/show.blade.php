<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Productos en el carrito</h1>

    @if($cartItems->isEmpty())
        <p>El carrito está vacío.</p>
    @else
        <ul>
            @foreach($cartItems as $item)
                <li>{{ $item->product->name }} - {{ $item->quantity }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
