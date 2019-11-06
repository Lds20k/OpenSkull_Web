<?php
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
session_start();
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
		<title>OpenSkull - Download</title>
	</head>
	<body class="bg-secondary text-light">	
		<?php Navbar::renderizar(2); ?>
		<div class="container-fluid border-bottom border-dark bg-light text-dark">
			<div class="row">
				<div class="col-sm-12 cont-curso">
					<div class="container">
						<h3 class="mt-4 mb-4"><i class="fas fa-paste"></i> Gerenciador de cursos e artigos</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container text-dark bg-light p-0">
			<div class="bd-example">
				<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
						<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="src/img/conteudonaoencontra255-98.png" class="d-block w-100" alt="...">
							<div class="carousel-caption d-none d-md-block">
								<h5>Rápido</h5>
								<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
							</div>
						</div>
						<div class="carousel-item">
							<img src="src/img/conteudonaoencontra255-98.png" class="d-block w-100" alt="...">
							<div class="carousel-caption d-none d-md-block">
								<h5>Intuitivo</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="carousel-item">
							<img src="src/img/conteudonaoencontra255-98.png" class="d-block w-100" alt="...">
							<div class="carousel-caption d-none d-md-block">
								<h5>Seguro</h5>
								<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div class="container text-dark bg-light">
			<div class="row">
				<div class="col-lg cont-curso">
					<div class="container">
						<h3><i class="fas fa-desktop"></i> Desktop</h3>
						<p class="mb-1">Disponível para:</p>
						<div class="overflow-hidden mb-1">
							<div class="float-left mr-2"><i class="fab fa-windows"></i></div>
							<div class="float-left ml-3 mr-3"><i class="fab fa-linux"></i></div>
							<div class="float-left ml-2"><i class="fab fa-apple"></i></div>
						</div>
						<a href="img/aa.png" download><button type="button" class="btn btn-dark"><i class="fas fa-cloud-download-alt"></i> Baixar</button></a>
						<br>
						<br>
					</div>
				</div>
			</div>
		</div>

		<?php include_once "src/include/footer.php"; ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>