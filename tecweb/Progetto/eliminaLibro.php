<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Elimina Libri - ScambioLibriVi </title>
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
        <p> Ti trovi in: <a href="index.php"> Home </a> - <a href="userHome.php"> Area Riservata </a> - Elimina Libro </p>
     </div>
    <div id="corpo">
        <h1>Elimina i tuoi libri</h1>
        <?php
        session_start();
        require_once 'connectDB.php';
        $reg = new connectDB();
        $openConnection = $reg -> accessDB();
        if(!$openConnection){
        	die("Errore nell'aprire il database");
        }
        else{
            $connessione= $reg -> getConnection();
            //creo un nuovo oggetto per eseguire la query nel database
            $user=$_SESSION["user"];
            $result=$connessione-> query("SELECT l.titolo,l.autore,c.codiceLibro AS cl FROM libro l INNER JOIN copialibro c ON (l.ISBN=c.ISBN) WHERE c.proprietario='$user' ORDER BY c.codiceLibro;");
            if($result->num_rows ==0)
                echo '<p>Non hai libri presenti</p>';
            else{
                echo "<p>Seleziona i libri che vuoi eliminare</p>"
                    ."<form action=\"actionEliminaLibro.php\" method=\"post\">"
                    ."<ul class=\"delBook\">";
                while($row=mysqli_fetch_assoc($result)){
                    $cl=$row['cl'];
                    $title=$row['titolo'];
                    $author=$row['autore'];
                    echo "<li><input type=\"checkbox\" name=\"$cl\" value=\"del\">$title di $author</input></li>";
                }
                echo "</ul><input type=\"submit\" value=\"Elimina\"/> </form>";
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