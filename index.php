<?php
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
session_start();
$cursos = json_decode(Requesicao::curlGet('curso'))->cursos;
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
		<title>OpenSkull - Welcome!</title>
	</head>
	<body class="bg-secondary text-light">
		<?php Navbar::renderizar(1); ?>
		<div class="container pt-3 pb-3">
			<h2>
				<strong>NOVOS CURSOS</strong>
			</h2>
			<div class="card-deck text-dark">
				<?php
				foreach ($cursos as $key => $curso) {
				?>
					<div class="card">
						<img src="<?php echo Requesicao::getUrl().'/midia/imagens/'.$curso->imagem;?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title"><?php echo $curso->nome;?></h5>
							<p class="card-text text-justify"><?php echo $curso->descricao;?></p>
							<a href="curso.php?id=<?php echo $curso->id;?>" class="btn btn-dark">Dar uma olhada</a>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>

		<div class="texto bg-dark">
			<div class="container pt-3 pb-3">
				<div class="row mb-5">
					<div class="col-sm anim">
						<h2>
							<strong>HISTORIA</strong>
						</h2>
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at mi pharetra, iaculis ante vitae, lacinia nulla. Proin in ornare augue. Aenean turpis lacus, cursus at orci quis, laoreet faucibus augue. Nunc id sapien eu ipsum maximus vulputate et tempus mi. Ut accumsan volutpat metus, eu venenatis diam. Etiam eleifend nisi vitae dui ultricies finibus. In lacus dolor, ornare ac nibh sit amet, congue bibendum sapien. Nunc eget tempor tellus. Sed semper quam arcu, quis hendrerit felis bibendum sed. Curabitur porttitor leo metus, at lacinia justo gravida nec. Fusce dignissim nisi at gravida pretium. Morbi accumsan urna id volutpat pretium. Maecenas lacinia, nisl nec tristique ornare, nulla tortor mattis purus, quis sagittis turpis ipsum nec libero. Curabitur ac pulvinar massa. Phasellus tempus facilisis justo sit amet blandit.
						</p>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-sm anim">
						<h2>
							<strong>MISSÃO</strong>
						</h2>
						<p class="text-justify">
							Nam fringilla ut neque sed vestibulum. Phasellus imperdiet, lacus vel tempor molestie, nulla ipsum sagittis turpis, ac vehicula velit ligula quis justo. Suspendisse erat nunc, pharetra sed ligula eu, suscipit scelerisque arcu. Cras commodo ac.
						</p>
					</div>
					<div class="col-sm anim">
						<h2>
							<strong>VISÃO</strong>
						</h2>
						<p class="text-justify">
							Quisque vulputate dui leo, pharetra consectetur augue commodo ut. Vestibulum molestie turpis arcu, vel pulvinar nunc facilisis sit amet. Curabitur et sapien et nibh luctus ornare. Sed egestas, metus non.
						</p>
					</div>
				</div>
				<div class="row anim">
					<div class="col-sm">
						<h2><strong>NOSSA EQUIPE</strong></h2>
						<ul class="lista-sem-estilo">
							<li>Bruno Ventura do Nascimento</li>
							<li>Caio Ventura do Nascimento</li>
							<li>Lucas Eiji Koga Accessor</li>
							<li>Lucas da Silva dos Santos</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container pt-3 pb-3">
			<h2 class="anim text-white">O que dizem:</h1>
			<div class="d-flex justify-content-center flex-wrap anim anim-start">
				<figure class="snip1192">
					<blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sodales vel arcu non vulputate. Aenean tempor, purus sed pretium sodales, odio sem semper magna, eget vulputate erat arcu eu dolor.</blockquote>
					<div class="author">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1"/>
						<h5>Bárbara<span>Ex aluna de C#</span></h5>
					</div>
				</figure>

				<figure class="snip1192">
					<blockquote>Ut laoreet tempus pellentesque. Mauris facilisis turpis mattis mauris vestibulum, nec vestibulum felis aliquam. Nullam nec arcu justo. Vivamus nisi orci, varius a magna eu, posuere ultricies libero. </blockquote>
					<div class="author">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample24.jpg" alt="sq-sample24"/>
						<h5>Jade<span>Aluna do COTIL</span></h5>
					</div>
				</figure>

				<figure class="snip1192">
					<blockquote>Quisque dapibus ac justo quis congue. Praesent fermentum vehicula tincidunt. Duis at sodales justo, sed lobortis ex. Fusce bibendum ex vel augue malesuada condimentum.</blockquote>
					<div class="author">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample29.jpg" alt="sq-sample29"/>
						<h5>Gabriella<span>Aluna de Java</span></h5>
					</div>
				</figure>
			</div>
		</div>

		<?php include_once "src/include/footer.php"; ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>

