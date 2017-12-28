<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Registrazione - ScambioLibriVi </title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="Scambio Libri Vi" />
        <meta name="description" content="Sito dedicato allo scambio di libri usati, pensato per la provincia di Vicenza e dintorni" />
		<link rel="stylesheet" type="text/css" href="style/style.css" media="handheld, screen"/>
		<link  rel = "stylesheet" type="text/css" href="style/small.css" media= "handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" />
		<link rel = "stylesheet" type="text/css"  href="style/print.css" media="print"/> 
     </head>
     <body>
     
	<div id="header">
     <div id="titolo">
		 <h1> Scambio Libri VI </h1>
		 <h2> La più semplice piattaforma per lo scambio dei libri, nella provincia di Vicenza  </h2>
     </div>
     
     <div id="logForm">
         <form id="loginForm">
         	<fieldset>
            	<legend> Login Area </legend>
                <label> User  </label> <br/>
                <input type="text" title="Inserisci User"/> <br/>
                <label> Password </label> <br/>
                <input type="password" title="Inserici la password"/> <br/>
                <input type="submit" value="Accedi" title="Clicca per accedere" /> <br/>
                <a id="linkregistrati" href="register.html" title="Oppure Registrati"> Registrati </a>
            </fieldset>
         </form>
	</div>
  </div>
  	 <div id="where">
        <p> Ti trovi in: <a href="index.php"> Home </a> - Registrati </p>
     </div>
     <div id = "menu">
        <ul>
            <li id="current">  <a hred="index.php"> <span xml:lang="en"> Home </span> </a> </li>
            <li class="centrali">  <a href="chisiamo.html">Chi Siamo </a></li>
            <li class="centrali">  <a href="contact.html"> Contattaci </a> </li>
            <li class="ultimo"> <a href="catalogo.html"> Catalogo </a> </li>
        </ul>
    </div>
    <div id="corpo">
    <?php
 		require_once 'connectDB.php';
        $reg = new connectDB();
        $openConnection = $reg -> accessDB();
        if(!$openConnection){
        	die("Errore nell'aprire il database");
        }
        else{
        	require_once 'connectRegister.php';
            //creo un nuovo oggetto per eseguire la query nel database
            $newUser = new acceptNewUser();
            //vado a richiedere la connessione al gestore delle connessioni
            $connessione= $reg -> getConnection();
        	//Vado a prendere gli elementi da $_POST e li mando in pasto alla funzione per mettere dentro nuovi elementi
            $user = $_POST["us"];
            $password = $_POST["psw"];
            $nome = $_POST["nom"];
            $cognome = $_POST["cogn"];
            $citta = $_POST["citt"];
            $provincia = $_POST["prov"];
            $email = $_POST["em"];
            $tel = $_POST["tel"];
            //Prima di andare ad inserire un utente devo vedere se l'user NON sia già inserito all'interno del database
            $isInDB = $newUser -> verifyUser($user,$connessione);
            //Controllo il risultato e vado a segnalare se c'è stato un errore
            if($isInDB){
            	echo '<p> Username già presente nel nostro database, torna alla pagina di <a href="register.html"> registrazione </a> ed effettua la registrazione con un altro usurname</p>';
            }
            else{
                //vado a richiamare la funzione per accettare un nuovo utente, ricordandomi di passargli anche la connessione
                $inserimento = $newUser -> acceptUser($connessione, $user, $password, $nome, $cognome, $citta, $provincia, $email, $tel);
                if($inserimento){
                    echo '<p> Registrazione avvenuta correttamente. Torna alla <a href="index.html" title="Torna alla home"> HOME </a> ed effettua il login per scambiare i tuoi libri, o prenderne di nuovi! </p>';
                }
                else{
                    echo 'Si è verificato un errore, la registrazione non è avvenuta. </br> Torna alla <a href="index.html"> Home </a> oppure prova a <a href="register.html"> Registrarti nuovamente </a> </p>';
                }
            }          
        }
        //Devo andare a chiudere la connessione sennò rimane latente 
        $reg -> closeConnection();
	?>
   
    </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
</body>
<\html>

