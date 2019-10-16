<?php
	require_once("util.php");
	session_start();

	$url = 'http://www.openskull.web_service.com/api/usuario/';
	$_SESSION['jwt'] = $_POST['jwt'];
	$url .= $_SESSION['jwt'];
	$resposta = json_decode(Requesicao::curlGet($url));
	$_SESSION['id'] 	= $resposta->usuario->id;
	$_SESSION['email']  = $resposta->usuario->email;
	$_SESSION['nome'] 	= $resposta->usuario->nome;
?>