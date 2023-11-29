<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="indexstyle.css">
  <title>Login</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f2f2f2;
    }
    
    .login-container {
      text-align: center;
      background-color: #fff;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    
    h1 {
      margin-top: 0;
    }
    
    input {
      margin-bottom: 10px;
      padding: 10px;
      width: 100%;
      box-sizing: border-box;
    }
    
    a {
      background-color: #4CAF50;
      color: white;
      padding: 7px 14px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>

</head>
<body>
  <div class="login-container">
    <h1>Iniciar sesion</h1>
    <?php
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "PaginaWeb";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Obtener los datos del formulario
      $enteredUsername = $_POST['username'];
      $enteredPassword = $_POST['password'];

      // Crear conexión a la base de datos
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verificar si la conexión fue exitosa
      if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
      }

      // Consulta SQL para buscar el usuario y contraseña ingresados
      $sql = "SELECT * FROM usuarios WHERE username = '$enteredUsername' AND password = '$enteredPassword'";
      $result = $conn->query($sql);

      // Verificar si se encontró una coincidencia en la base de datos
      if ($result->num_rows > 0) {
        

          // Inicio de sesión exitoso

          $mensaje = "Inicio de sesion exitoso";
          $redireccion = "funcionalidad.php"; // Página a la que deseas redireccionar

          $script = "<script>alert('$mensaje'); window.location.href = '$redireccion';</script>";

            echo $script;

          // echo "Inicio de sesión exitoso.";
          // header("Location: inicio.php");
      } else {
          // Credenciales incorrectas

          $mensaje = "usuario o contraseña incorrectos";
          $redireccion = "index.php"; // Página a la que deseas redireccionar

          $script = "<script>alert('$mensaje'); window.location.href = '$redireccion';</script>";

          echo $script;
      }

      // Cerrar la conexión a la base de datos
      $conn->close();
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <br>
      <br>
      <input type="password" name="password" placeholder="Password" required>
      <br>
      <br>
      <button type="submit">Iniciar sesion</button> 
      <br>
      <br>
      <a href="crud.php">Registrarme</a>
      <br>
      <br>
    </form>
  </div>

</body>
</html>
