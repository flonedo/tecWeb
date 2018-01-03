<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
  if(!isset($_SESSION["user"])){
    	header("Location:index.php");
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Aggiungi Libro - ScambioLibriVi </title>
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
     
     <a class="abutt" id="logout" href="logout.php" title="Esci"> Logout </a>
        
  </div>
  	 <div id="where">
        <p> Ti trovi in: <a href="index.php"> Home </a> - <a href="userHome.php"> Area Riservata </a> - Aggiungi Libro </p>
     </div>
    <div id="corpo">
        <h1> Aggiungi un libro </h1>
        <form id="addBookForm" action="actionAggiungiLibro.php"  method="post" enctype="multipart/form-data">
         	<fieldset>
            	<legend> Aggiunta nuovo libro </legend>
                <p  id="note" class="request">  (*) Campo obbligatorio. </p>
                <!--Inserimento ISBN -->
                <label> codice ISBN <span class="request"  title="campo obbligatorio" > * </span> </label> <span id="presente"></span> <br/>
                <input class="inputText" name="isbn" type="text" title="Inserisci ISBN"/> <br/>
                <!--Inserimento itolo -->
                <label> Titolo <span class="request"  title="campo obbligatorio" > * </span> </label> <span id="presente"></span> <br/>
                <input class="inputText" name="title" type="text" title="Inserisci titolo"/> <br/>
                <!--Inserimento Autore -->
                <label> Autore <span class="request"  title="campo obbligatorio" > * </span> </label> <span id="presente"></span> <br/>
                <input class="inputText" name="author" type="text" title="Inserisci Autore"/> <br/>
                <!--Inserimento Casa editrice -->
                <label> Casa Editirice <span class="request"  title="campo obbligatorio" > * </span> </label> <span id="presente"></span> <br/>
                <input class="inputText" name="editor" type="text" title="Inserisci Casa Editrice"/> <br/>  
                <!--Inserimento Anno pubblicazione -->
                <label> Anno Pubblicazione <span class="request"  title="campo obbligatorio" > * </span> </label> <span id="presente"></span> <br/>
                <input class="inputText" name="year" type="number" title="Inserisci Anno di pubblicazione"/> <br/>  
                
                <!--Inserimento Prezzo -->
                <label> Prezzo <span class="request"  title="campo obbligatorio" > * </span> </label> <span id="presente"></span> <br/>
                <input class="inputText" name="price" type="number" step="0.01" title="Inserisci Prezzo"/> <br/>
                <!--Inserimento Stato -->
                <label> Stato di usura <span class="request"  title="campo obbligatorio" > * </span> </label> <span id="presente"></span> <br/>
                <input class="inputText" name="state" type="text" title="Inserisci Stato"/> <br/>
                <!--Inserimento Note -->
                <label> Note </label> <span id="presente"></span> <br/>
                <textarea name="note" title="InserisciNote"> </textarea>
                <!-- <input class="inputText" name="note" type="text" title="Inserisci Note "/> --><br/>
                <!--Inserimento Foto -->
                <label> Foto del libro  </label> <span id="presente"></span> <br/>
                <input class="inputText" name="photo" type="file" title="Inserisci Foto "/> <br/>
                
                <input id="submit" type="submit" value="Conferma" title="Clicca per confermare" /><br/>
                
            </fieldset>
         </form>
         
    </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
   </body>
</html>
