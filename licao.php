<?php
session_start();
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
$licao = json_decode(Requesicao::curlGet('licao/one/'.$_GET['id']))->licao;
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="src/fontawesome/css/all.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="src/css/estilo.css">
		<script type="text/javascript" src="src/js/util.js"></script>
		<title>OpenSkull - <?php echo $curso->nome; ?></title>
	</head>
	<body class="bg-secondary text-light">
		<?php Navbar::renderizar(2); ?>
		<div class="container-fluid bg-light text-dark">
			<div class="row">
				<div class="col-sm-12 cont-curso">
					<div class="container">
						<h3 class="mt-4 mb-4"><?php echo $licao->nome; ?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container bg-light text-dark">
			<div class="row">
				<div class="col">
					Poe o video e o conteudo aqui
				</div>
			</div>
		</div>
		<?php include "src/include/footer.php"; ?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>