<?php

require_once("../model/PessoaDAO.php");

class deleta {

    private $deleta;

    public function __construct($id) {
        $this->deleta = new PessoaDAO();
        if ($this->deleta->deletePessoa($id) == TRUE) {
            echo "<script>alert('Registro deletado com sucesso!');document.location='../view/listar.php'</script>";
        } else {
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }

}

new deleta($_GET['id']);
