//importande o driver Mysql com suporte para promise
import mysql from "mysql2/promise";

import dotenv from "dotenv";

dotenv.config();

//criando o pool e usando a variavel de ambiente
const pool = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME,
  //maximo de conexões simultaneas:
  connectionLimit: 10,
});

//exporta a conexão para os outros arquivos
export default pool;
