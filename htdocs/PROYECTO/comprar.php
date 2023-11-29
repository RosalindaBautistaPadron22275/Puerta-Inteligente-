<!DOCTYPE html>
<html>
<head>
    <title>Carrito de compras</title>
    <link rel="stylesheet" type="text/css" href="Carritos.css">
</head>
<body>
    <div class="producto">
        <h2>Cerradura</h2>
        <h3>500</h3>
        <button class="agregar" data-nombre="Cerradura" data-precio="500">Agregar al carrito</button>
    </div>
    <div class="producto">
        <h2>Mantenimiento</h2>
        <h3>250</h3>
        <button class="agregar" data-nombre="Mantenimiento" data-precio="250">Agregar al carrito</button>
    </div>
    <div class="carrito">
        <h2>Carrito</h2>
        <div id="items"></div>
            <button id="pagar">Pagar</button>
        
    </div>
    <script src="comprar.js"></script>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "Paginaweb";

        $conn = new mysqli($servername, $username, $password, $dbname);

       
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        
        $carrito = json_decode($_POST['carrito'], true);

        
        foreach ($carrito['items'] as $item) {
            $nombreProducto = $item['nombre'];
            $precioProducto = $item['precio'];
            $cantidadProducto = $item['cantidad'];

            $sql = "INSERT INTO pagos (nombre, precio, cantidad) VALUES ('$nombreProducto', '$precioProducto', '$cantidadProducto')";

            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        echo "Productos agregados al carrito con éxito";

        $conn->close();
    }
    ?>
</body>
</html>
