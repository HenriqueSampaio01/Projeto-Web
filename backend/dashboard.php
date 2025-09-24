<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html"); // se não estiver logado, volta pro login
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>FoodHub - Área Restrita</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header>
    <h2>FoodHub - Área Restrita</h2>
    <nav>
      <ul>
        <li><a href="../html/usuarios.html">Gerenciar Usuários</a></li>
        <li><a href="pedidos.php">Gerenciar Lanches</a></li>
        <li><a href="../backend/logout.php">Sair</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h3>Bem-vindo, <?php echo $_SESSION["user_nome"]; ?> 👋</h3>
  </main>
</body>
</html>
