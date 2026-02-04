//importande o driver Mysql com suporte para promise
import mysql from "mysql2/promise";

//criando o pool e usando a variavel de ambiente
const pool = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASS,
  database: process.env.DB_NAME,
  //maximo de conexões simultaneas:
  connectionLimit: 10,
});

//exporta a conexão para os outros arquivos
export default pool;
