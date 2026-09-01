<!DOCTYPE HTML>
<html>
    <?php include("../view/head.php") ?>
    <body>
        <?php include("../view/menu.php") ?>
        <form method="post" action="../controller/ControllerLogin.php"" id="form" name="form" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required autofocus>
                <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit" id="submit" name="submit">Logar</button>
            </div>           
        </form>
    </body>
</html>