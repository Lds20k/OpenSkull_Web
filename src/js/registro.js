$(":input").inputmask();

function registrar(erroDOM, primeiroNome, segundoNome, dataNascimento, instituicao, email, rEmail, senha, rSenha){
	erroDOM.innerHTML = "";
	var parametros = "nome=" + primeiroNome + "&sobrenome=" + segundoNome + "&dataNascimento=" + dataNascimento+ "&instituicao=" + instituicao + "&email=" + email + "&senha="+ senha;
	var flag = false;

	if(email != rEmail){
		erroDOM.innerHTML = "<div>Os email não coencidem</div>";
		flag = true;
	}

	if(senha != rSenha){
		erroDOM.innerHTML = erroDOM.innerHTML + "<div>As senhas não coencidem</div>";
		flag = true;
	}

	if(!flag){
		var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		  	try{
		  		var erros = "";
		  		var erro = JSON.parse(this.responseText);
				for(i = 0; i < erro.conteudo.length; i++){
					erros = erros + "<div>"+erro.conteudo[i]+"</div>";
				}
				erroDOM.innerHTML = erros;
		  	}catch(e){
		  		window.location.href = "index.php";
		  	}
		  }
		};
		http.open("POST", webService + "usuario/registrar.php", true);
		http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		http.send(parametros);
	}
}