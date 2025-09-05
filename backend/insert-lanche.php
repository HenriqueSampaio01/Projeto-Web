<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $ingrediente = $_POST["ingrediente"];
    $preco = $_POST["preco"];

    $stmt = $conn->prepare("INSERT INTO lanches (nome, ingrediente, preco) VALUES (:nome, :ingrediente, :preco)");
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":ingrediente", $ingrediente);
    $stmt->bindParam(":preco", $preco);

    if ($stmt->execute()) {
        header("Location: ../html/lanches.html");
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
?>
