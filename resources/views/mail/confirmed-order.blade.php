<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td>
                            <h1>Confirmación de orden</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Estimado {{ $guest->name }},</p>
                            <p>Gracias por su compra! Aquí están los detalles:</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedido->guestDetalles as $detalle)
                                    <tr>
                                        <td>{{ $detalle->producto->name }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>{{ $detalle->subtotal }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Total: {{ $pedido->total }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Gracias por comprar en nuestra tienda!</p>
                            <p>PQM - Pharmaceutical Quality Management</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <footer>
                                <p>&copy; {{ date('Y') }} PQM. Todos los derechos reservados.</p>
                            </footer>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
