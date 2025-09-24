<?php
session_start();
require_once "db.php"; // conexão com o banco

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user["senha"])) {
            // Criar sessão
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_nome"] = $user["nome"];

            // Redirecionar para área restrita
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('E-mail ou senha inválidos!'); window.location.href='../html/login.html';</script>";
        }
    } catch (PDOException $e) {
        echo "Erro no servidor: " . $e->getMessage();
    }
}
?>
