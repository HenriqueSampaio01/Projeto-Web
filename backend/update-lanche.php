<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $ingredientes = $_POST["ingredientes"];
    $preco = $_POST["preco"];

    if (!empty($preco)) {
        $sql = "UPDATE lanches SET nome = :nome, ingredientes = :ingredientes, preco = :preco WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":preco", $preco);
    } else {
        $sql = "UPDATE usuario SET nome = :nome, ingredientes = :ingredientes WHERE id = :id";
        $stmt = $conn->prepare($sql);
    }

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":ingredientes", $ingredientes);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    header("Location: ../html/lanches.html");
}
?>
