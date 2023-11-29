<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Productos disponibles</h1>
    <form action="carrito.php" method="post">
        <label for="producto_id">Producto:</label>
        <select name="producto_id" id="producto_id">
            <!-- Supongamos que los IDs de los productos son 1 y 2, actualiza según sea necesario -->
            <option value="1">Cerradura - $500</option>
            <option value="2">Mantenimiento - $250</option>
        </select>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" value="1">
        <button type="submit" name="pagar">Pagar</button>
    </form>
</body>
</html>
