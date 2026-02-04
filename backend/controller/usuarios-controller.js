//importando a conexão com o bando de dados
import db from "../database/connection.js";

//listando todos os usuários
export const list = async (req, res) => {
  const { id } = req.params; //pegando o id da URL (/usuarios/:id)

  const [rows] = await db.query("SELECT * FROM usuarios WHERE id = ?", [id]);
  res.json(rows[0]);
};

//criando usuário
export const create = async (req, res) => {
  const { nome, email } = req.body; //pegando os dados enviados no body (JSON)

  await db.query("INSERT INTO usuarios (nome, email) VALUES (?, ?)", [nome, email]);
  (res.status(201), json({ message: "Usuário criado" }));
};

//atualizando/editando os usuários
export const update = async (req, res) => {
  const { id } = req.params;
  const { nome, email } = req.body;

  await db.query("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?", [nome, email, id]);
  res.json({ message: "Usuário atualizado" });
};

//deletando usuario
export const remove = async (req, res) => {
  const { id } = req.params;

  await db.query("DELETE FROM usuarios WHERE id = ?", [id]);
  res.json({ message: "Usuário removido" });
};
