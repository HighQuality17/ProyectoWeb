
<div class="container mx-auto mt-8 p-6 bg-gray-100 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Reporte de Ventas</h2>

    @if($sales->isEmpty())
        <p class="text-center text-gray-600">No hay ventas registradas.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Fecha de Venta</th>
                        <th class="py-3 px-6 text-left">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($sales as $sale)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $sale->id }}</td>
                            <td class="py-3 px-6">{{ $sale->sale_date }}</td>
                            <td class="py-3 px-6 font-semibold text-green-600">${{ number_format($sale->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
