<?php

require_once("../model/PessoaDAO.php");

class ControllerEditar {

    private $editar;
    private $idd;
    private $nome;
    private $sobrenome;
    private $cpf;
    private $idade;
    private $flag;

    public function __construct($id) {
        $this->editar = new PessoaDAO();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id) {
        $row = $this->editar->pesquisaPessoa($id);
        $this->idd = $row['id'] ?? ' ';
        $this->nome = $row['nome'] ?? ' ';
        $this->sobrenome = $row['sobrenome'] ?? ' ';
        $this->cpf = $row['cpf'] ?? ' ';
        $this->idade = $row['idade'] ?? ' ';
        $this->flag = $row['flag'] ?? ' ';
    }

    public function editarFormulario($id, $nome, $sobrenome, $cpf, $idade, $flag) {
        if ($this->editar->updatePessoa($id, $nome, $sobrenome, $cpf, $idade, $flag) == true) {
            echo "<script>alert('Registro alterado com sucesso!');document.location='../view/listar.php'</script>";
        } else {
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }

    public function getIdd() {
        return $this->idd;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getFlag() {
        return $this->flag;
    }

}

$id = filter_input(INPUT_GET, 'id');
$editar = new ControllerEditar($id);
if (isset($_POST['submit'])) {
    $editar->editarFormulario($_POST['id'], $_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['idade'], $_POST['flag']);
}
