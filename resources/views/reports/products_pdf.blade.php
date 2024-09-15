<h1>Reporte de Productos</h1>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Linea</th>
            <th>Descripcion</th>
            <th>Peso</th>
            <th>Talla</th>
            <th>Marca</th>
            <th>Color</th>
            <th>Garantia</th>
            <th>Stock</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->line }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->weight }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->brand}}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->guarantee }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
