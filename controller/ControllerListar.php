<?php

require_once("../model/PessoaDAO.php");

class ControllerListar {

    private $lista;

    public function __construct() {
        $this->lista = new PessoaDAO();
        $this->criarTabela();
    }

    private function criarTabela() {
        $row = $this->lista->getPessoa();
        foreach ($row as $value) {
            echo "<tr>";
            echo "<th>" . $value['id'] . "</th>";
            echo "<th>" . $value['nome'] . "</th>";
            echo "<td>" . $value['sobrenome'] . "</td>";
            echo "<td>" . $value['idade'] . "</td>";
            echo "<td>" . $value['cpf'] . "</td>";
            echo "<td>" . $value['flag'] = ($value['flag'] == "0") ? "Desativo" : "Ativo" . "</td>";
            echo "<td><a class='btn btn-warning' href='../view/editar.php?id=" . $value['id'] . "'>Editar</a><a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=" . $value['id'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
    }
}
