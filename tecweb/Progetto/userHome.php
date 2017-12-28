<?php
	session_start();
    //controllo se sono presenti delle sessioni attive, in caso contrario reindirizzo alla homepage
    if(!isset($_SESSION["user"])){
    	header("Location:index.php");
    }
?> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Area Personale - ScambioLibri </title>
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
		 <?php
         	echo '<h2> La pagina personale di <span id="nome" >'. $_SESSION["user"].'</span> </h2>';
         ?>
     </div>
     <div id="logOut">
     	<a href="logout.php"> Logout </a>
     </div>
     </div>
     <div id="corpo">
     <!--Corpo della pagina -->
     <h1> Il tuo profilo </h1>
     	<a href="modProf.php" class= "abutt"> Modifica il tuo profilo </a> <br/>
        <a href="aggiungiLibro.php" class= "abutt"> Aggiungi un libro da scambiare </a> <br/>
        <a href="eliminaLibro.php"class= "abutt"> Elimina uno dei libri da te inseriti </a> <br/>
        <a href="eliminaProfilo.php" class= "abutt"> Elimina il tuo profilo </a> <br/>
     </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
</body>
</html>

     