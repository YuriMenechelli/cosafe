<?php
session_start();

include_once '../models/Conexao.php';
include_once '../models/Usuario.php';

$usuario = new Usuario();

$login = addslashes($_POST['login']);
$senha = md5($_POST['senha']);

if (isset($_POST['login']) && !empty($_POST['login'])) {
	$usuario->logado($login, $senha);
}
?>