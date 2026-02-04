//importando apenas o Router do express:
import { Router } from "express";

//importando todas as funções do controller:
import * as usuriosController from "../controller/usuarios-controller.js";

const router = Router();

//criando as rotas para o app:
router.get("/", usuriosController.list); //GET | LISTA

router.get("/:id", usuriosController.getById); //Esse lista por ID

router.post("/", usuriosController.create); //POST | CRIA

router.put("/:id", usuriosController.update); //PUT | EDITA VARIOS

router.delete("/:id", usuriosController.delete);

//exportando para o server.js usar
export default router;
