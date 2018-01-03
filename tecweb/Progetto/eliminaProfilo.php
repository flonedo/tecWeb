<?php
	session_start();
    //Controllo che sia stato fatto il login in precedenza
     if(!isset($_SESSION["user"])){
    	header("Location:index.php");
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Elimina Profilo - ScambioLibri </title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="Scambio Libri Vi" />
        <meta name="description" content="Sito dedicato allo scambio di libri usati, pensato per la provincia di Vicenza e dintorni" />
		<link rel="stylesheet" type="text/css" href="style/style.css" media="handheld, screen"/>
		<link  rel = "stylesheet" type="text/css" href="small.css" media= "handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" />
		<link rel = "stylesheet" type="text/css"  href="print.css" media="print"/> 
     </head>
     <body>
     <div id="header">
     <div id="titolo">
		 <h1> Scambio Libri VI </h1>
		 <h2> La pagina personale di <span id="nome" >Marco96</span> </h2>     </div>
     <div id="logOut">
     	<a href="logout.php"> Logout </a>
     </div>
     </div>
     <div id="corpo">
    <div id="where">
        <p> Ti trovi in: <a href="index.php"> Home </a> - <a href="userHome.php"> Area Riservata </a> - Elimina Profilo </p>
     </div>
     <!--Corpo della pagina -->
     <h1> Elimina definitivamente il tuo profilo </h1>
     <p id="confEl"> Sei sicuro di volere eliminare il tuo profilo definitivamente?</p>
     <a href="deleteProfilo.php" class="abutt"> Si, elimina profilo </a> <br/>
     <a href="userHome.php" class="abutt"> Torna alla pagina principale del tuo profilo </a>
     </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
</body>
</html>

     