<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>

<body>

<?php
function excluirRegistro($conexao, $id_cliente)
{
    try {
        // Prepara a consulta SQL para excluir o registro com o ID fornecido
        $sql = "DELETE FROM Cadastro WHERE id_cliente = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$id_cliente]);

        echo "<div class='container success'>";
        echo "Registro com ID $id_cliente excluído com sucesso!";
    } catch (PDOException $e) {
        echo "<div class='container error'>";
        echo "Erro ao excluir registro: " . $e->getMessage();
    } finally {
        echo "<br>";
        echo "<a href='index.php'>Voltar para a página principal</a>";
        echo "</div>";
    }
}

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    try {
        // Conecta ao banco de dados (substitua pelos seus dados de conexão)
        $conexao = new PDO("mysql:host=localhost;dbname=empresa", "root", "");

        // Define o modo de erro do PDO para exceção
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        excluirRegistro($conexao, $id_cliente);
    } catch (PDOException $e) {
        echo "<div class='container error'>";
        echo "Erro na conexão: " . $e->getMessage();
        echo "<br>";
        echo "<a href='index.php'>Voltar para a página principal</a>";
        echo "</div>";
    } finally {
        // Fecha a conexão com o banco de dados
        $conexao = null;
    }
} else {
    echo "<div class='container error'>";
    echo "ID não fornecido na URL.";
    echo "<br>";
    echo "<a href='index.php'>Voltar para a página principal</a>";
    echo "</div>";
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>