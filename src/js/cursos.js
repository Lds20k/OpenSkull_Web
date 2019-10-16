function logar(emailDOM, senhaDOM, erroDOM){
	var email		= emailDOM.value;
	var senha		= senhaDOM.value;
	var parametros  = "email="+email+"&senha="+senha;

	var http = new XMLHttpRequest();
	http.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
	  	try{
	  		var erro = JSON.parse(this.responseText);
	  		var erros = "";
			for(i = 0; i < erro.conteudo.length; i++){
				erros = erros + "<div>"+erro.conteudo[i]+"</div>";
			}
			erroDOM.innerHTML = erros;
	  	}catch(e){
	  		location.reload();
	  	}
	  }
	};
	http.open("POST", webService + "usuario/logar.php", true);
	http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	http.send(parametros);
}

function deslogar(){
	var http = new XMLHttpRequest();
	http.open("POST", webService + "usuario/deslogar.php");
	http.onreadystatechange = function() {
		location.reload();
	}
	http.send();
}