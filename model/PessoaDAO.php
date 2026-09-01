<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class PessoaDAO {

    protected $sqlite;

    private function conexao() {
        $this->sqlite = new SQLite3('../GerenciadorPessoaBD.db');
    }

    public function salvar() {

        $this->conexao();

        $sql = $this->sqlite->prepare("INSERT INTO pessoa ('senha', 'nome', 'sobrenome', 'cpf', 'idade','flag') VALUES (:senha,:nome,:sobrenome,:cpf,:idade,:flag)");

        $sql->bindValue(':senha', md5($_POST['senha']), SQLITE3_TEXT);
        $sql->bindValue(':nome', $_POST['nome'], SQLITE3_TEXT);
        $sql->bindValue(':sobrenome', $_POST['sobrenome'], SQLITE3_TEXT);
        $sql->bindValue(':cpf', $_POST['cpf'], SQLITE3_INTEGER);
        $sql->bindValue(':idade', $_POST['idade'], SQLITE3_INTEGER);
        $sql->bindValue(':flag', 1, SQLITE3_INTEGER);

        $result = $sql->execute();
        if ($result !== false) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/listar.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function pesquisaLogin() {
        $this->conexao();
        session_start();
        if ($this->sqlite->query("SELECT * FROM pessoa WHERE cpf = " . $_POST['cpf'] . " AND senha = '" . md5($_POST['senha']) . "'") == true) {
            $_SESSION['login'] = true;
            echo "<script>alert('Login feito com sucesso!');document.location='../view/listar.php'</script>";
        } else {
            $_SESSION['login'] = false;
            echo "<script>alert('Cpf ou senha invalidos!');history.back()</script>";
        }
    }

    public function getPessoa() {
        $this->conexao();
        $result = $this->sqlite->query("SELECT * FROM pessoa");
        $array = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    public function deletePessoa($id) {
        $this->conexao();
        if ($this->sqlite->query("DELETE FROM pessoa WHERE id = " . $id . "") == true) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePessoa($id, $nome, $sobrenome, $cpf, $idade, $flag) {
        $this->conexao();        
        $stmt = $this->sqlite->prepare("UPDATE pessoa SET id = :id, nome = :nome, sobrenome = :sobrenome, idade = :idade, cpf = :cpf, flag = :flag WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
        $stmt->bindValue(':sobrenome', $sobrenome, SQLITE3_TEXT);
        $stmt->bindValue(':cpf', $cpf, SQLITE3_INTEGER);
        $stmt->bindValue(':idade', $idade, SQLITE3_INTEGER);
        $stmt->bindValue(':flag', $flag, SQLITE3_INTEGER);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

    public function pesquisaPessoa($id) {
        $this->conexao();
        $stmt = $this->sqlite->prepare("SELECT * FROM pessoa WHERE id=:id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();

        if ($result) {
            $row = $result->fetchArray(SQLITE3_ASSOC);
            $stmt->close();
            return $row;
        }

        return null;
    }

}
