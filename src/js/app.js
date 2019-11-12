/*
var $target = $('.anim'),
	animationClass = 'anim-start';

function anim($c){
	$c.addClass(animationClass);
}

anim($target);
*/
function on() {
	document.getElementById("overlay").style.display = "block";
	document.getElementById("formulario").style.display = "block";
	document.getElementsByTagName("HTML")[0].style.overflowY = "hidden";
}

function off() {
	document.getElementById("overlay").style.display = "none";
	document.getElementById("formulario").style.display = "none";
	document.getElementsByTagName("HTML")[0].style.overflowY = "scroll";
}

function login() {
	var usuario = {
		email: document.getElementById("txtLoginEmail").value,
		senha: document.getElementById("pssLoginSenha").value
	};
	if(usuario.email == '' || usuario.senha == ''){
		document.getElementById("loginErro").innerHTML = "Preencha todos os campos!";
	}else{
		requisitarRestApi("usuario/jwt", usuario, "POST", function(resposta){
			if(resposta){
				if(resposta.status){
					logar(resposta.jwt);
				}else{
					document.getElementById("loginErro").innerHTML = "Email ou senha incorretos!";
				}
			}
		});
	}
}

function logout(){
	document.getElementById("overlay").style.display = "block";
	document.getElementsByTagName("HTML")[0].style.overflowY = "hidden";
	deslogar();
}

function comprar(jwtIn, cursoIdIn){
	var enviar = {
		jwt: jwtIn,
		cursoId: cursoIdIn
	};
	console.log(enviar);

	requisitarRestApi("usuario/curso/adicionar", enviar, "POST", function(resposta){
		if(resposta){
			console.log(resposta);
			document.getElementById("overlayComprar").style.display = "block";
			document.getElementsByTagName("HTML")[0].style.overflowY = "hidden";
			if(resposta.status){
				document.getElementById("compraRetorno").innerHTML = "Compra efetuada com sucesso!";
			}else{
				document.getElementById("compraRetorno").innerHTML = "Erro ao fazer compra!";
			}
		}
	});
}

function comprarOff(){
	document.getElementById("overlayComprar").style.display = "none";
	document.getElementsByTagName("HTML")[0].style.overflowY = "scroll";
}