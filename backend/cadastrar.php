<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];

    if ($senha !== $confirmaSenha) {
        echo json_encode(["error" => "As senhas não conferem"]);
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senhaHash);
        $stmt->execute();

        echo json_encode(["message" => "Usuário cadastrado com sucesso"]);
    } catch (PDOException $e) {
    echo json_encode([
        "error" => $e->getMessage(),
    ]);
    }
}
?>
