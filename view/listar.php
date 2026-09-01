<?php require_once("../controller/ControllerListar.php"); ?>
<!DOCTYPE html>
<html>
    <?php include("../view/head.php") ?>
    <body>
        <?php include("../view/menu.php") ?>
        <a class="btn-cadastrar" href="cadastro.php">Cadastrar</a>
        <button class="btn-cadastrar" style="visibility: collapse;">Cadastrar Pessoa</button>        
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Idade</th>
                    <th>CPF</th>
                    <th>Status</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php new ControllerListar(); ?>
            </tbody>
        </table>
    </body>
</html>