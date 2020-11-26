<?php

include_once '../models/Conexao.php';
include_once '../models/Usuario.php';

$usuario = new Usuario();

isset($_POST['login'])   ? $login    = addslashes($_POST['login']) : '';
isset($_POST['nome'])    ? $nome     = addslashes($_POST['nome']) : '';
isset($_POST['cpf'])     ? $cpf      = addslashes($_POST['cpf']) : '';
isset($_POST['senha'])   ? $senha    = $_POST['senha'] : '';
isset($_POST['inserir']) ? $inserir  = $_POST['inserir'] : '';


if (isset($login) != '' && isset($senha) != '' && isset($inserir)) {
	$usuario->cadastrar_usuario($login, $nome, $cpf, $senha);
}

if (isset($_GET['acao']) == 'excluir') {
	if (isset($_GET['id'])) {
		$usuario->excluir_usuario($_GET['id']);
	}
}

if (isset($_POST['edit'])) {
	if (isset($_POST['id']) && isset($_POST['login'])) {
		$usuario->edit_usuario($_POST['id'], $login, $nome, $cpf, $senha);
	}
}

if (isset($_POST['reset']) && $_POST['login'] != '') {
	
	$usuario->reset_senha($_POST['login']);
}




?>