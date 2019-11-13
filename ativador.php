<?php
require_once('src/include/navbar/navbar.php');
require_once('php/util.php');
session_start();
if(!isset($_SESSION['jwt']))
    header("Location: index.php");

$usuario = json_decode(Requesicao::curlGet('usuario/'.$_SESSION['jwt']))->usuario;
if($usuario->tipo != 'a')
    header("Location: index.php");

$cursos = json_decode(Requesicao::curlGet('usuario/curso/desativados'));
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
		<title>OpenSkull - Ativador</title>
	</head>
	<body class="bg-secondary text-light">
        <?php Navbar::renderizar(3); ?>
        <div class="container text-dark" id="cursosContainer" style="min-height: 600px;">
            <?php
            if(!empty($cursos->possui)){
                foreach($cursos->possui as $key => $possui){                
            ?>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <a type="button" class="btn btn-success mr-2" href="php/ativar.php?idUsuario=<?php echo $possui->id_usuario?>&idCurso=<?php echo $possui->id_curso?>">Ativar</a>Curso: <?php echo $possui->id_curso?> Usuario: <?php echo $possui->id_usuario?> Ativado: <?php echo $possui->ativado?>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
		<?php include_once "src/include/footer.php"; ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>