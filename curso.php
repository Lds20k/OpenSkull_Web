<?php
session_start();
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
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

		<div class="container bg-light text-dark">
			<div class="row">
				<div class="col-sm-9">
					<div>
						<h1><?php echo $curso->nome; ?></h1>

						<h4>Descrição:</h4>
						<p><?php echo $curso->descricao; ?></p>

						<h4>Sobre</h4>
						<p><?php echo $curso->descricao; ?></p>
					</div>
					<div>
						<h4>Modulos:</h4>
						<div id="accordion">
							<?php
							$i = 1;
							foreach ($curso->modulos as $chave => $modulo) {
							
							?>
							<div class="card">
								<div class="card-header" id="heading<?php echo convertNumberToWord($i); ?>">
									<h2 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo convertNumberToWord($i); ?>" aria-expanded="true" aria-controls="collapse<?php echo convertNumberToWord($i); ?>">
										<?php echo $modulo->nome; ?>
										</button>
									</h2>
								</div>
								<div id="collapse<?php echo convertNumberToWord($i); ?>" class="collapse" aria-labelledby="heading<?php echo convertNumberToWord($i); ?>" data-parent="#accordion">
									<div class="card-body">
										<ul style="padding-left: 10px;">
											<?php
											foreach($modulo->licoes as $chave => $licao){
												echo "<li>$licao->nome</li>";
											}
											?>
										</ul>
									</div>
								</div>
							</div>
							<?php
							$i++;
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-sm-3 bg-primary text-light pt-2 pb-2">
					<div>
						<div>
							<img src="/src/img/perfil.png" class="rounded-circle m-auto d-block" style="width: 50%;">
							<h5 class="text-center"><?php echo $curso->criador->nome;?></h5>
							<div class="dropdown-divider"></div>
							<?php 
							if(!is_null($curso->criador->biografia)){
							?>
								<p class="text-justify"><?php echo $curso->criador->biografia; ?></p>
							<?php 
							}
							?>
						</div>
						<div class="text-center">
							<div class="dropdown-divider"></div>
							<h5>Informações adicionais</h5>
							<h6>
								<?php 
								$totalHoras = $curso->horas;
								if($totalHoras == 0)
									echo 'Nenhuma hora';
								else if($totalHoras == 1)
									echo $totalHoras . ' hora';
								else
									echo $totalHoras . ' horas';
								?>
							</h6>
							<h6>
								<?php
								$totalModulos = count($curso->modulos);
								if($totalModulos == 0)
									echo 'Nenhum modulo';
								else if($totalModulos == 1)
									echo $totalModulos . ' modulo';
								else
									echo $totalModulos . ' modulos';
								?>
							</h6>
							<div class="dropdown-divider"></div>
							<h5 class="ml-auto mr-auto mb-2" style="overflow: hidden;">
								<?php 
									if($curso->preco == null || $curso->preco <= 0){
										echo 'Livre';
									}else{
								?>
										<div class="text-right float-left" style="font-size: 9px; width: 50%;">
											<span class="font-weight-normal d-block">TOTAL DE</span>
											<span class="font-weight-normal d-block">R$</span>
										</div>	
								<?php
										echo '<div class="text-left float-left" style="font-size: 24px; line-height: 20px; width: 50%;">';
										printf("%0.2f", $curso->preco);
										echo '</div>';
									}
								?>
										
							</h5>
							<button type="button" class="btn btn-success btn-block"><i class="fas fa-coins"></i> Comprar</button>
						</div>
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