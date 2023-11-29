<?php
include('connection.php');
$con = connection();

$id = null;
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "INSERT INTO usuarios( name, lastname, username, password, email) VALUES ('$name', '$lastname', '$username', '$password', '$email')";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: crud.php");
    exit();
} else {
    echo "Error al insertar en la base de datos: " . mysqli_error($con);
}

mysqli_close($con);
?>
