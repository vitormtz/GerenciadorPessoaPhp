<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require("../model/PessoaDAO.php");

if (isset($_POST['submit'])) {
    $teste = new PessoaDAO();
    $teste->salvar();
}