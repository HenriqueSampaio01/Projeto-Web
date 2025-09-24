<?php
require_once "db.php";

$stmt = $conn->query("SELECT id, nome, email FROM usuario");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($usuarios);
?>
