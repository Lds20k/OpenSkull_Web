<?php

require_once("util.php");

Requesicao::curlPost('usuario/curso/ativar?idUsuario='.$_REQUEST['idUsuario'].'&idCurso='.$_REQUEST['idCurso']);

header("Location: ../ativador.php");
