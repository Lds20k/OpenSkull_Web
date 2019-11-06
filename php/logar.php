<?php
	require_once("util.php");
	session_start();

	$api = 'usuario/';
	$_SESSION['jwt'] = $_POST['jwt'];
	$api .= $_SESSION['jwt'];
	$resposta = json_decode(Requesicao::curlGet($api));
	$_SESSION['id'] 	  = $resposta->usuario->id;
	$_SESSION['email'] 	  = $resposta->usuario->email;
	$_SESSION['nome'] 	  = $resposta->usuario->nome;
	$_SESSION['carteira'] = 200;
?>