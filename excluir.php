<?php
$id=$_POST['id'];
$servidor = "localhost";
$DB = "construcaoCivil";
$nome = "vitoria";
$senha = "20050425";
$con = mysqli_connect($servidor,$nome,$senha,$DB);

$sql = "DELETE FROM cadastro WHERE id=$id";
if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  header('Location: cd.php');




?>