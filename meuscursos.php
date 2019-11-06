<?php
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
session_start();
if(!isset($_SESSION['jwt'])){
    header("Location: cursos.php");
}
$cursos = json_decode(Requesicao::curlGet('usuario/curso/'.$_SESSION['jwt']))->cursos;
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
		<title>OpenSkull - Cursos</title>
	</head>
	<body class="bg-secondary text-light">
		<?php Navbar::renderizar(2); ?>
		<div class="container-fluid bg-light text-dark">
			<div class="row">
				<div class="col-sm-12 cont-curso">
					<div class="container">
						<h3 class="mt-4 mb-4"><i class="fas fa-pencil-alt"></i> Meus cursos</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container text-dark" id="cursosContainer" style="min-height: 600px;">
			<div class="row mt-3 mb-3">
				<?php
				foreach ($cursos as $key => $curso) {
				?>
					<a href="estudar.php?id=<?php echo $curso->id;?>" class="col-sm-6 mt-3 mb-3 text-dark text-decoration-none">
						<div class="card shadow-lg <?php echo $curso->ativado ? 'border-success' : 'border-danger'; ?>" style="max-width: 540px; border: none; border-bottom: 15px solid;">
							<div class="row no-gutters">
								<div class="col-md-4">
									<img src="src/img/conteudonaoencontra255-255.png" class="card-img" alt="...">
								</div>
								<div class="col-md-8">
									<div class="card-body p-3" style="height: 100%;">
										<h5 class="card-title"><?php echo $curso->nome;?></h5>
										<p class="card-text text-justify" style="font-size: 15px; min-height: 68px;"><?php echo $curso->descricao;?></p>
										<p class="card-text position-absolute" style="bottom: 10px;width: calc(100% - 2rem);">
											<small class="text-muted float-left"><?php echo $curso->criador->nome;?></small>
											<small class="text-muted float-right"><?php echo $curso->horas;?>hrs</small>
										</p>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php
				}
				?>
			</div>
		</div>
		
		
		<?php include_once "src/include/footer.php"; ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>