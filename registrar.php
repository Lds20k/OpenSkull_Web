<?php
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
session_start();
/*
if(!isset($_SESSION['jwt']))
    header("Location: index.php");*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="src/fontawesome/css/all.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="src/css/estilo.css">
		<script type="text/javascript" src="src/js/util.js"></script>
		<title>OpenSkull - Registrar</title>
	</head>
	<body class="lBody">
		<?php Navbar::renderizar(1); ?>
		<br><br>
		<div>
			<div id="signup" class="container">
				<div class="row">
					<div class="col-sm-12">
						<h5>Cadastro</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<label for="">Primeiro nome*</label>
						<input type="text" class="form-control" id="PrimeiroNome" placeholder="Primeiro nome">
					</div>
				</div>

				<div class="row"> 
					<div class="form-group col-sm-12">
						<label for="">Segundo nome*</label>
						<input type="text" class="form-control" id="SegundoNome" placeholder="Segundo nome">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="">Data de nascimento*</label>
						<input type="text" class="form-control" id="DataNascimento" placeholder="dd/mm/aaaa" data-inputmask="'alias': '99/99/9999'">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="">Instituição</label>
						<input type="text" class="form-control" id="Instituicao" placeholder="Instituição">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="">Email*</label>
						<input type="email" class="form-control" id="RegistrarEmail" aria-describedby="Email" placeholder="Email" >
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="">Repita email*</label>
						<input type="email" class="form-control" id="rRegistrarEmail" aria-describedby="Repeat email" placeholder="Repite o email" >
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12">
						<label for="">Senha*</label>
						<input type="password" class="form-control" id="RegistrarSenha" placeholder="Senha" >
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="">Repita senha*</label>
						<input type="password" class="form-control" id="rRegistrarSenha" placeholder="Repita a senha" >
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<button onclick="registrar(document.getElementById('erroR'), document.getElementById('PrimeiroNome').value, document.getElementById('SegundoNome').value, document.getElementById('DataNascimento').value, document.getElementById('Instituicao').value, document.getElementById('RegistrarEmail').value, document.getElementById('rRegistrarEmail').value, document.getElementById('RegistrarSenha').value, document.getElementById('rRegistrarSenha').value)" class="btn btn-primary">Inscrever-se</button>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div id="erroR"></div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<?php include_once "src/include/footer.php"; ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="js/dist/jquery.inputmask.js"></script>
		<script type="text/javascript" src="src/js/configuracao.js"></script>
		<script type="text/javascript" src="src/js/registro.js"></script>
	</body>
</html>
<?php
	if(isset($_SESSION['ID'])){
		header("Location: ../index.php");
		exit();
	}
?>