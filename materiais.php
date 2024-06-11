<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Materiais</title>
</head>
<body>

<header>
        <br><br>
        <h1>Benaia Construções</h1>
        <p>Sua Parceira em Projetos de Construção</p>
    </header>

    <nav>
        <ul>
            <li><a href="inndex.html">Início</a></li>
            <li><a href="materiais.php">Materiais</a></li>
            <li><a href="cd.php">Cadastro</a></li>
            <li><a href="mapa.html">Mapa</a></li>
        </ul>
    </nav>
    <br><br>
<center>
    <h1>
    <strong> tabela de materiais</strong>
    </h1>
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

$query = "SELECT * FROM materiais_construcao";
$result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0)
    echo "<table border='1'>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>material</th>";
            echo "<th>Fornecedor A</th>";
            echo "<th>Fornecedor B</th>";
            echo "<th>Fornecedor C</th>";
            echo "<th>Fornecedor D</th>";
        echo "</tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['id_material'] . "</td>";
            echo "<td>" . $row['nome_material'] . "</td>";
            echo "<td>" . $row['preco_fornecedor_A'] . "</td>";
            echo "<td>" . $row['preco_fornecedor_B'] . "</td>";
            echo "<td>" . $row['preco_fornecedor_C'] . "</td>";
            echo "<td>" . $row['preco_fornecedor_D'] . "</td>";

         
    }
    echo "</table>";

$material=$_POST["material"];
$a=$_POST["FornecedorA"];
$b=$_POST["FornecedorB"];
$c=$_POST["FornecedorC"];
$d=$_POST["FornecedorD"];
$id=$_POST["id"];

$sql = "INSERT INTO mateariais_construcao VALUES ('$id', '$material', '$a', '$b', '$c', '$d',)";
mysqli_query($con,$sql) or die ("erro");
mysqli_close($con);
echo "cliente cadastrado";

?>
</center>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Benaia Construções. Todos os direitos reservados.<br>Contato: (85)9 89893-6361<br> Aberta desde fevereiro de 2024.</p>
        </div>
    </footer>

</body>
</html>