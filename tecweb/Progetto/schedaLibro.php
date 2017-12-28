<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Scheda libro - ScambioLibriVi </title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="Scambio Libri Vi" />
        <meta name="description" content="Sito dedicato allo scambio di libri usati, pensato per la provincia di Vicenza e dintorni" />
		<link rel="stylesheet" type="text/css" href="style/style.css" media="handheld, screen"/>
		<link  rel = "stylesheet" type="text/css" href="style/small.css" media= "handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" />
		<link rel = "stylesheet" type="text/css"  href="style/print.css" media="print"/> 
        <script src="showDetailsBook.js"></script>
     </head>
     <body>
     
	<div id="header">
     <div id="titolo">
		 <h1> Scambio Libri VI </h1>
		 <h2> La più semplice piattaforma per lo scambio dei libri, nella provincia di Vicenza  </h2>
     </div>
     
     <div id="logForm">
         <form id="loginForm" method="post" action="actionLogin.php">
         	<fieldset>
            	<legend> Login Area </legend>
                <label> User  </label> <br/>
                <input  name="us" type="text" title="Inserisci User"/> <br/>
                <label> Password </label> <br/>
                <input name="psw" type="password" title="Inserici la password"/> <br/>
                <input type="submit" value="Accedi" title="Clicca per accedere" /> <br/>
                <a id="linkregistrati" href="register.html" title="Oppure Registrati"> Registrati </a>
            </fieldset>
         </form>
	</div>
  </div>
  	 <div id="where">
        <p> Ti trovi in: Scheda del libro </p>
     </div>
     <div id = "menu">
        <ul>
            <li id="current">  <a href="index.php"> <span xml:lang="en"> Home  </span> </a> </li>
            <li class="centrali">  <a href="chisiamo.html">Chi Siamo </a></li>
            <li class="centrali">  <a href="contact.html"> Contattaci </a> </li>
            <li class="ultimo"> <a href="catalogo.php"> Catalogo </a> </li>
        </ul>
    </div>
    <div id="corpo">
    <?php
    	//Vado a recuperarmi l'id del libro
    	$id = $_GET["id"];
        //Vado ad eseguire la connessione
         require_once 'connectDB.php';
        $lib = new connectDB();
        $openConnection = $lib -> accessDB();
        if(!$openConnection){
        	die("Errore nell'aprire il database");
        }
        else{
        	require_once 'infoLibro.php';
            //mi faccio dare la connessione
            $connection = $lib -> getConnection();
            //Creo l'oggetto per eseguire la query
            $infoL = new infoLibro();
            //vado ad eseguire la query per avere i dati del libro SENZA i generi ad esso associato
            $resultInfo = $infoL -> getInfoLibro($connection, $id);
            //Mi prelevo le informazioni relative al venditore
            $infoVenditre = $infoL -> getInfoVenditore($resultInfo["username"], $connection);
            if(!$infoVenditre){
            	echo "<p> Errore nel trovare i risultati dell'utente </p>";
            }
            else{
                  //creo i cookie relativi all'infoVenditore
           		 $infoL -> setCookie($infoVenditre);
            }

            //Vado a stampare le informazioni del libro
            if($resultInfo){
                	$output =  '<h1>'.$resultInfo["titolo"].'</h1>'.
                                    '<img src="images/'.$resultInfo["foto"].'" id="fotoLibro" alt="La foto del libro '.$resultInfo["titolo"].'"/>'.
                                    '<div id="infoL">'.
                    				'<p id="ISBN" class="info"> <span class="grass"> ISBN: </span>'.$resultInfo["ISBN"].'</p>'.
                                    '<p id="autore" class="info"> <span class="grass"> Autore: </span>'.$resultInfo["autore"].'</p>'.
                                    '<p id="prezzo" class="info"> <span class="grass"> Prezzo: </span>'.$resultInfo["prezzo"].'</p>'.
                                    '<p id="stato" class="info"> <span class="grass"> Stato del libro: </span>'.$resultInfo["stato"].'</p>'.
                                    '<p id="casaEditrice" class="info"> <span class="grass"> Casa Editrice: </span>'.$resultInfo["casaEditrice"].'</p>'.
                                    '<p id="annoP" class="info"> <span class="grass"> Anno di pubblicazione: </span>'.$resultInfo["annoPubblicazione"].'</p>'.
                                    '<p id="zona" class="info"> <span class="grass"> Il venditore si trova in zona: </span>'.$resultInfo["citta"].'</p>'.
                                    '</div>';
                     if($resultInfo["note"]!=NULL){
                     	$output = $output. '<p id="note" class="info"> <span class="grass"> Note del venditore: </span>'.$resultInfo["note"].'</p>';
                     }
                     echo $output.'<button type="button" onclick="showDetails()"> Vedi i dettagli del venditore </button> 
                        <div id="dettaUser">
                     	<p id="user"> </p>
                        <p id="name"> </p>
                        <p id="cognome"> </p>
                        <p id="citta"> </p>
                        <p id="provincia">  </p>
                        <p id="email"> </p>
                        <p id="numeroTelefono"> </p>
                        <button type="button" onclick="closeDetails()"> Chiudi dettagli </button>
                        </div>
                     ';
                                    
                
            }
            else{
            	echo "<p> Non ci sono informazioni da visualizzare </p>";
            }
        }
        
    ?>
    </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
 </body>
 </html>