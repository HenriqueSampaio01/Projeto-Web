<?php
require_once "db.php";

$stmt = $conn->query("SELECT id, nome, ingredientes, preco FROM lanches");
$lanches = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($lanches);
?>
