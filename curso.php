<?php
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
session_start();
$curso = json_decode(Requesicao::curlGet('curso/'.$_GET['id']))->curso;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="/src/fontawesome/css/all.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/src/css/estilo.css">
		<script type="text/javascript" src="/src/js/util.js"></script>
		<title>OpenSkull - <?php echo $curso->nome; ?></title>
	</head>
	<body class="bg-secondary text-light">
		<?php Navbar::renderizar(2); ?>
		<ol class="breadcrumb" style="border-radius: 0; border: 2px solid #e9ecef; margin: 0 auto;">
				<li class="breadcrumb-item"><a href="cursos.php">Cursos</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $curso->nome; ?></li>
			</ol>

			<div class="container" style="padding-top: 5px;">
				<div class="row">
					<div class="col-sm-9 titleCurso" style="padding-top: 25px;">
						<h1><?php echo $curso->nome; ?></h1>

						<h4>Descrição:</h4>
						<span><?php echo $curso->descricao; ?></span>

						<h4>O que você vai aprender:</h4>
						<ul>
							<li>Pellentesque consequat nisi sit amet sem finibus malesuada.</li>
							<li>Phasellus quis nisi et purus varius placerat.</li>
							<li>Etiam porta erat sit amet dui pulvinar, non tempor nunc lacinia.</li>
							<li>Ut fringilla tellus a dictum malesuada</li>
						</ul>
					<?php if(!is_null($curso->criador->biografia)){ /* Caso o professor tiver uma descricao, esta sera imprimida */ ?>
						<h4>Sobre o professor:</h4>
						<span><?php echo $curso->criador->biografia; ?></span>
					<?php } ?>
					</div>
					<div class="col-sm-3" style="background: #0f6f6e; color: white; padding-top: 25px;">
						<h5>Oferecido por: <?php echo $curso->criador->nome;?></h5>
						<img src="/src/img/perfil.png" class="rounded-circle" style="width: 50%;">
						<br>
						<h6><?php echo $curso->horas; ?> Horas</h6>
						<button type="button" class="btn btn-success"><i class="fas fa-coins"></i> Comprar</button>
					</div>
				</div>
			</div>
			<div class="container" style="padding-top: 5px;">
				<div class="row">
					<div class="col-sm-12 accordCurso">
						<h4 class="text-white" style="padding-left: 50px; padding-top: 10px;">Conteudo do curso:</h4>
						<div class="accordion" id="accordionExample">
							<div class="card">
								<div class="card-header" id="heading<?php echo convertNumberToWord($i); ?>">
									<h2 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
										</button>
									</h2>
								</div>
								<div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionExample">
									<div class="card-body">
										<ul style="padding-left: 10px;">
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row border border-dark ">
					<div class="col-sm-12 cont-curso">
						<div class="container">
						</div>
					</div>
				</div>
			</div>

		<?php include "src/include/footer.php"; ?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html