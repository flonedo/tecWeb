//Funzione Ajax che mi permette di richiedere al database se l'uesr è già stato inserito
 function isPresent(str){
  	var xhttp = new XMLHttpRequest();
    var risposta = false;
    if(this.responseText.length != 0 ){
      risposta = true;
    }
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
  return risposta;
 }
 
 //Funzione AJAX per richiedere al database se l'user inserito è gia presente o no
 function showIsPossible(str){
    if (str.length == 0) { 
      document.getElementById("presente").innerHTML = "";
       document.getElementById("aiutoUsername").style.display="none";  
      return;
    }
 	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != " "){
            document.getElementById("presente").innerHTML = this.responseText;
            //devo attivare l'aiuto alla navigazione
            document.getElementById("aiutoUsername").style.display="block";
        }
      	
    }
  };
  xmlhttp.open("GET", "register.php?q=" +str , true);
  xmlhttp.send();
}

function checkNome(nome){
	var nomeInserito = nome.value;
    if(nomeInserito.length == 0){
        mostraErrore(nome, "Il nome è richiesto");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(nomeInserito)){
		togliErrore(nome);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(nome, "Nome non inserito correttamente");
		return false;
	}
}

function checkCognome(cognome){
	var cog = cognome.value;
    if(cog.length == 0){
        mostraErrore(cognome, "Il cognome è richiesto");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(cog)){
		togliErrore(cognome);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(cognome, "Cognome non inserito correttamente");
		return false;
	}
}

function checkCity(citta){
	var city = citta.value;
    if(city.length == 0){
        mostraErrore(citta, "La città è richiesta");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(city)){
		togliErrore(citta);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(citta, "Città non valida");
		return false;
	}
}

function checkProv(provincia){
	var prov = provincia.value;
    if(prov.length == 0){
        mostraErrore(provincia, "La provincia è richiesta");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(prov)){
		togliErrore(provincia);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(provincia, "Provincia non valida");
		return false;
	}
     
}

function checkEmail(email){
	var em = email.value;
    if(em.length == 0){
        mostraErrore(email, "La email è richiesta");
         return false;
    }
	var pattern = new RegExp("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$");
	if(pattern.test(em)){
		togliErrore(email);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(email, "Formato della mail non è valido");
		return false;
	}
     
}

function checkTel(telefono){
    var tel = telefono.value;
    if(tel.length==0){
        togliErrore(telefono);
        return true;
    }
    var pattern = new RegExp("/^(d{10})+$/");
    if(pattern.test(tel)){
        togliErrore(telefono);
        return true;
    }
    else{
        mostraErrore(telefono, "Formato del numero di telefono non è corretto!")
        return false;
    }
    
}

function checkPassword(password){
    var psw = password.value;
    if(psw.length == 0){
        mostraErrore(password, "La password è richiesta");
        return false;
    }
    if(psw.length<=12){
        togliErrore(password);
        return true;
    }
    else{
        mostraErrore(password, "La password piò essere lunga fino a 12 caratteri ");
        return false;
    }
    
    
}

function mostraErrore(input, testo){
	togliErrore(input);
	var p = input.parentNode; //recupero il nodo padre 
	var e = document.createElement("strong"); //creo un nuovo elemento
	e.className = "err"; //assegno una classe
	e.appendChild(document.createTextNode(testo)); //crea un nodo di testo con questo testo
	p.appendChild(e); //appendo il testo dell'errore
}

function togliErrore(input){
	var p = input.parentNode;
	if(p.children.length == 2){
		p.removeChild(p.children[1]);
	}
}

//Funzione per verificare che una form sia completata nel modo corretto
 function correctForm(){
 	var user = document.forms["registerForm"]["us"];
    var password = document.forms["registerForm"]["psw"];
    var nome = document.forms["registerForm"]["nom"];
    var cognome = document.forms["registerForm"]["cogn"];
    var citt = document.forms["registerForm"]["citt"];
    var prov = document.forms["registerForm"]["prov"];
    var em = document.forms["registerForm"]["em"];
    var tel = document.forms["registerForm"]["tel"];
    var pass = document.forms["registerForm"]["psw"];
    
    
    var correct = checkNome(nome);
    var correctCog = checkCognome(cognome);
    var correctCity = checkCity(citt);
    var correctProv = checkProv(prov);
    var correctEmail = checkEmail(em);
    var correctTel = checkTel(tel);
    var correctPassword = checkPassword(pass);
     
   correct = correct && correctCog && correctCity && correctProv && correctEmail && correctTel && correctPassword;

     return correct;
 }
 
 
 