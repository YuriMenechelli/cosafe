<?php 
session_start();

include_once '../models/Conexao.php';
include_once '../models/Usuario.php';

$usuario = new Usuario();

$usuario->logout();

header('Location: ../login.php?deslogado');

?>