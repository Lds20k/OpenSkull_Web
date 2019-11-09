function logar(jwt){
	var http = new XMLHttpRequest();
	http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try{
                document.getElementById('formLogin').submit();
                location.reload();
            }catch(exceptions){
                console.log("Impossivel fazer login: " + exceptions);
            }
        }
      };
	http.open("POST", "php/logar.php", true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.send('jwt='+jwt);
}

function deslogar(){
	var http = new XMLHttpRequest();
	http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try{
                location.reload();
            }catch(exceptions){
                console.log("Impossivel fazer logout: " + exceptions);
            }
        }
      };
	http.open("GET", "php/logout.php", true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.send();
}

function requisitarRestApi(api, parametros, metodo, funcao){
    let url = "http://localhost:8000";
    api = "/api/" + api;
	var http = new XMLHttpRequest();
	http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try{
                var resposta = JSON.parse(this.responseText);
                funcao(resposta);
            }catch(exceptions){
                console.log("Impossivel fazer a converção par json: " + exceptions);
                console.log("Para: " + url + api );
            }
        }
    };
    
    if(parametros != null){
        parametros = transformaQuery(parametros);
    }else{
        parametros = '';
    }
	http.open(metodo, url + api + parametros, true);
    http.send();
}

function transformaQuery(parametros){
    var keyNames = Object.keys(parametros);
    var valores = Object.values(parametros);
    var requisicao;
    for(var i = 0; i < keyNames.length; i++){
        if(i === 0){
            requisicao = keyNames[i] + '=' + valores[i];
        }else{
            requisicao += keyNames[i] + '=' + valores[i];
        }
        if(i + 1 < keyNames.length){
            requisicao += '&';
        }
    }
    return '?' + requisicao;
}