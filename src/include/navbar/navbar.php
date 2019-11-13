<?php
abstract class Navbar{
    private static $index;

    private static function menu(){
        ?>
        <script type="text/javascript" src="src/js/app.js"></script>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
            <a class="navbar-brand" href="#">
                <img src="src/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                OpenSkull
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php Navbar::abas(); ?>
                </ul>
                <?php
                if( !isset($_SESSION['jwt']) ){
                ?>
                <button class="btn btn-light" onclick="on();"><i class="fas fa-user"></i> Entrar</button>
                <div id="overlay">
                    <div id="fundo" onclick="off(this)"></div>
                    <div id="formulario" class="shadow">
                        <form id="formLogin" class="card text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Iniciar Sessão</h5>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="txtLoginEmail" aria-describedby="emailHelp" placeholder="Email">
                                    <small id="emailHelp" class="form-text text-muted">Você nunca deve compartilhar seu email</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input type="password" class="form-control" id="pssLoginSenha" placeholder="Senha">
                                </div>
                                <div class="form-group" id="loginErro"></div>
                                <button onclick="login();" class="btn btn-dark" type="button">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php 
                } else { 
                ?> 
                    <div class="btn-group dropleft">
                        <button type="button" id="btnUsuario" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['nome']; ?>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="perfil.php">Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="logout();">Sair</a>
                        </div>
                    </div>
                    <div id="overlay">
                        <div id="fundo"></div>
                        <div class="spinner-border text-light" id="spinnerLogout" role="status">
                            <span class="sr-only">Carregando...</span>
                        </div>
                    </div>
                <?php 
                } 
                ?>
            </div>
        </nav>
        <?php
    }

    private static function abas(){
        ?>
            <li class="nav-item <?php Navbar::atual(1, Navbar::$index);?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
        <?php
        if( isset($_SESSION['jwt']) ){
        ?>
            
            <li class="nav-item dropdown <?php Navbar::atual(2, Navbar::$index);?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="cursos.php">Todos</a>
                    <a class="dropdown-item" href="meuscursos.php">Meus</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="download.php">Criar</a>
                </div>
            </li>
            <?php
            $usuario = json_decode(Requesicao::curlGet('usuario/'.$_SESSION['jwt']))->usuario;
            if($usuario->tipo === 'a'){
            ?>
                <li class="nav-item <?php Navbar::atual(3, Navbar::$index);?>">
                    <a class="nav-link" href="ativador.php">
                        Ativador
                    </a>
                </li>
            <?php
            }
        }else{
        ?>
            <li class="nav-item <?php Navbar::atual(2, Navbar::$index);?>">
                <a class="nav-link" href="cursos.php">
                    Cursos
                </a>
            </li>
        <?php
        }

        
    }

    private static function atual($numeroPagina, $index){
        if($index == $numeroPagina){
            echo 'active';
        }
    }

    public static function renderizar(int $index){
        Navbar::$index = $index;
        Navbar::menu();
    }
}
?>