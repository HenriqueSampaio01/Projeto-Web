document.getElementById("formCadastro").addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(document.getElementById("formCadastro"));

  try {
    const response = await fetch("../backend/cadastro.php", {
      method: "POST",
      body: formData
    });

    const data = await response.json();

    if (data.message) {
      alert(data.message);
      window.location.href = "login.html";
    } else {
      alert(data.error);
    }
  } catch (error) {
    alert("Erro de conexão com o servidor.");
  }
});