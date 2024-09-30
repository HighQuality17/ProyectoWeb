<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #4CAF50;
            color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        tbody td {
            color: #333;
        }

        td {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Reporte de Productos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Línea</th>
                <th>Talla</th>
                <th>Marca</th>
                <th>Color</th>
                <th>Garantía</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->line }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->guarantee }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

