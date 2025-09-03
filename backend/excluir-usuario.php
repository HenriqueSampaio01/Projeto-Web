<?php
require_once "db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM usuario WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

header("Location: ../frontend/usuarios.html");
exit;
?>
