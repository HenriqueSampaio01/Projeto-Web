<?php
require_once "db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM lanches WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

header("Location: ../html/lanches.html");
exit;
?>
