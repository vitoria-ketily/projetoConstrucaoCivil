<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Construção Civil</title>
    <link rel="stylesheet" href="cd.css">
</head>
<body>
    <header>
        <br>
        <h1>Benaia Construções</h1>
        <br>
    </header>
    <br>
    <nav>
        <ul>
            <li><a href="inndex.html">Início</a></li>
            <li><a href="materiais.php">Materiais</a></li>
            <li><a href="tela.html">Sobre</a></li>
            <li><a href="mapa.html">Mapa</a></li>
        </ul>
    </nav>
    <br><br><br>
    <form action="cd.php" method="POST" id="formu">
        <h2>Formulario de Cadastro</h2>
        <label for="id">Id:</label>
        <input type="text" id="id" name="id">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        <label for="telefone">Telefone:</label>
        <input type="number" id="telefone" name="telefone">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email">
        <label for="servico">Tipo de Serviço:</label>
        <select id="servico" name="servico">
            <option value="construcao">Construção</option>
            <option value="reforma">Reforma</option>
            <option value="manutencao">Manutenção</option>
            <option value="compra">Compra</option>
        </select>
        <center>
            <button type="submit" id="butao">Cadastrar</button>
        </center>
    </form>
    <br><br>
    <h1><strong>Tabela de Cadastro</strong></h1>

    <?php
    $servidor = "localhost";
    $DB = "construcaoCivil";
    $nome = "vitoria";
    $senha = "20050425";
    $con = mysqli_connect($servidor, $nome, $senha, $DB);

    if (!$con) {
        die("MORREU" . mysqli_connect_error());
    }

    $query = "SELECT * FROM cadastro";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>nome</th>";
        echo "<th>telefone</th>";
        echo "<th>email</th>";
        echo "<th>deletar</th>";
        echo "<th>editar</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>
                <form action='excluir.php' method='post'>
                    <button type='submit' name='id' value='" . $row['id'] . "'>x</button>
                </form>
            </td>";
            echo "<td>
                <form action='altera.php' method='post'>
                    <button type='submit' name='id' value='" . $row['id'] . "'>?</button>
                </form>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $tel = $_POST["telefone"];
    $email = $_POST["email"];
    $sql = "INSERT INTO cadastro VALUES ('$id', '$nome', '$tel', '$email')";

    if (mysqli_query($con, $sql)) {
        echo "deu bom";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    ?>
  
</body>
</html>