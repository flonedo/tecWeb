 //Funzione per verificare che una form sia completata nel modo corretto
 function correctForm(){
 	var user = document.forms["registerForm"]["us"].value;
    var password = document.forms["registerForm"]["psw"].value;
    var nome = document.forms["registerForm"]["nom"].value;
    var cognome = document.forms["registerForm"]["cogn"].value;
    var citt = document.forms["registerForm"]["citt"].value;
    var prov = document.forms["registerForm"]["prov"].value;
    var em = document.forms["registerForm"]["em"].value;
    
    if(password.length == 0 || nome.length== 0 || cognome.length==0 || citt.length==0 || prov.length==0 ||em.length ==0){
    	alert("User, Password, Nome, Cognome, Città, Provincia ed Email sono campi obbligatori");
        return false;
    }
    
   	if(password.length > 12){
    	alert("La password inserita è troppo lunga, la lunghezza massima è 12 caratteri");
        return false;
    }
    if(isPresent(user)){
    	alert("In nome utente non è più disponibile");
        return false;
    }
 }
 
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
      return;
    }
 	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      	document.getElementById("presente").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "register.php?q=" +str , true);
  xmlhttp.send();
}

 