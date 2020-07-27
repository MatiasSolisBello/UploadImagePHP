<?php
$con = mysqli_connect("localhost","root","","kalaiphpforms");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM user WHERE id = $id";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Conexion fallida al eliminar.");
  }
  
  header('Location: ../index.php');
}
