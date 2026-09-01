<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once("../model/PessoaDAO.php");

if (isset($_POST['submit'])) {
    $teste = new PessoaDAO();
    $teste->pesquisaLogin();
    exit();
}

if (isset($_SESSION['login'])) {
    header("Location: ../view/listar.php");
} else {
    header("Location: ../view/login.php");
}