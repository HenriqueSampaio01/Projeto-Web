<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (!empty($senha)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":senha", $senhaHash);
    } else {
        $sql = "UPDATE usuario SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
    }

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    header("Location: ../html/usuarios.html");
}
?>
