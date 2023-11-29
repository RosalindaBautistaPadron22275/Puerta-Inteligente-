<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en línea</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        .product {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            background-color: #fff;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
            text-align: center;
        }
        button:hover {
            background-color: #0056b3;
        }
        input[type="number"] {
            width: 50px;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Paginaweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pagar'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    
    $sql = "SELECT precio FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $stmt->bind_result($precio);
    $stmt->fetch();
    $stmt->close();
    
    $total = $precio * $cantidad;
    
    $sql = "INSERT INTO pedidos (producto_id, cantidad, total) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iid", $producto_id, $cantidad, $total);
    $stmt->execute();
    $stmt->close();
    
    // echo "Pedido realizado con éxito!";
}

$sql = "SELECT id, nombre, precio FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form method='post'>";
        echo "Producto: " . $row["nombre"] . " - Precio: " . $row["precio"];
        echo "<input type='hidden' name='producto_id' value='" . $row["id"] . "' />";
        echo "<input type='number' name='cantidad' value='1' />";
        echo "<button type='submit' name='pagar'>Pagar</button>";
        echo "</form>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
</body>
</html>