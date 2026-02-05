//importando apenas o Router do express:
import { Router } from "express";

//importando todas as funções do controller:
import * as usuariosController from "../controller/usuarios-controller.js";

const router = Router();

//criando as rotas para o app:
router.get("/", usuariosController.list); //GET | LISTA

router.get("/:id", usuariosController.getById); //Esse lista por ID

router.post("/", usuariosController.create); //POST | CRIA

router.put("/:id", usuariosController.update); //PUT | EDITA VARIOS

router.delete("/:id", usuariosController.remove);

//exportando para o server.js usar
export default router;
