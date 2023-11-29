<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="funcion.css">
    <title>Funcionalidad</title>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php">Home</a>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="informacion.php">Informacion</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="funcionalidad.php">Funcionalidad</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="index.php" tabindex="-1" aria-disabled="true">Cerrar sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</head>
<body>

<div class="tabla">
<h1>Actividad e informacion de la cerradura</h1>
<table>
    <tr>
        <th>Cerradura</th>
        <th>Estatus</th>
        <th>Lugar</th>
        <th>fecha</th>
        <th>Hora</th>
    </tr>
</div>
    <?php
        // Establecer la conexión a la base de datos MySQL
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "paginaweb";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error en la conexión a la base de datos: " . $conn->connect_error);
        }
        
        // Consulta SQL para obtener los datos de la cerradura
        $sql = "SELECT * FROM cerradura";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Mostrar los datos de la cerradura en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['cerradura'] . "</td>";
                echo "<td>" . $row['estatus'] . "</td>";
                echo "<td>" . $row['lugar'] . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "<td>" . $row['hora'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron registros.</td></tr>";
        }
        
        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
</table>


    
</body>
</html>