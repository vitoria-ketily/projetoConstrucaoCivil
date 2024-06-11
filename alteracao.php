<?php

$servidor = "localhost";
$DB = "construcaoCivil";
$nome = "vitoria";
$senha = "20050425";
$con = mysqli_connect($servidor,$nome,$senha,$DB);

var_dump($_POST);
$velhoId=$_POST['velhoId'];
$novoId=$_POST['novoId'];

$id = $_POST['id'];

    $query = "UPDATE cadastro SET id=$novoId WHERE id=$velhoId";
    echo $query;

    $result = mysqli_query($con,$query);

    if (mysqli_query($con, $query)) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($con);
    }
    mysqli_close($con);

header("Location: cd.php");

?>