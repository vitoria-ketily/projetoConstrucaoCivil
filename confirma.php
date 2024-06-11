<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<a href="cadastrados.php">Voltar</a><br><br>


<?php

$servidor = "localhost";
$DB = "construcaoCivil";
$nome = "vitoria";
$senha = "20050425";
$con = mysqli_connect($servidor,$nome,$senha,$DB);

  if(!$con) {
      die("MORREU". mysqli_connect_error());
  }
  echo "SUCESSO";

  $id = $_POST['id'];

  $query = "SELECT * FROM cadastro where id=$id";

  $result = mysqli_query($con,$query);
  echo "teste";
  if(mysqli_num_rows($result) > 0)
  while($row = mysqli_fetch_array($result)){
    echo "<br>Você tem certeza que deseja excluir o registro do ". $row['nome']." com ID ".$row['id']."?";
  }

?>


<form action="exclui.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <p>Você tem certeza que deseja excluir este registro?</p>
  <button type="submit">Excluir</button>

</form>
</body>
</html>