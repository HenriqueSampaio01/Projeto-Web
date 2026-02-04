//importando as bibliotecas instaladas:
import express from "express";
import dotenv from "dotenv";

//importando os arquivos das rotas
import rotaUsuarios from "./rotas/usuarios.js";
import rotaLanches from "./rotas/lanches.js";

const app = express();
dotenv.config();

app.use(express.json()); //fazendo o express receber em JSON

//fazendo o app entender que, tudo que tiver /usuarios ele vai usar os arquivos que vem
//da rota usuarios e assim para os lanches tbm
app.use("/usuarios", rotaUsuarios);
app.use("/lanches", rotaLanches);

const PORT = 3000;
app.listen(PORT, () => {
  console.log("Servidor rodando na porta 3000");
});
