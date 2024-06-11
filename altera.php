<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center> 
    <br><br>
    Mude seu id:</p>
</center>
<center>   
<?php

$servidor = "localhost";
$DB = "construcaoCivil";
$nome = "vitoria";
$senha = "20050425";
$con = mysqli_connect($servidor,$nome,$senha,$DB);

if(!$con) {
    die("MORREU". mysqli_connect_error());
}

$idParaAlterar = $_POST["id"];

$query = "SELECT * FROM cadastro WHERE id=$idParaAlterar";




$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0)
    echo "<form action=\"alteracao.php\" method=\"post\">";

    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>  id velho:<input type='text' name=\"velhoId\" value='" . $row['id'] . "'><br>";
            echo "<td>  id novo:<input type='text' name=\"novoId\" value='" . $row['id'] . "'><br>";
            
            echo "<input type=\"submit\">";
            echo "</tr>";
    }
    echo "</form>";

?>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br>
<center>
<footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Benaia Construções. Todos os direitos reservados.<br>Contato: (85)9 89893-6361<br> Aberta desde fevereiro de 2024.</p>
        </div>
</footer>
</center

    </body>
</html>