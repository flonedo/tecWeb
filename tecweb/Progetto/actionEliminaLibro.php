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
	<title> Eliminazione Libri - ScambioLibriVi </title>
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
        <p> Ti trovi in: <a href="index.php"> Home </a> - <a href="userHome.php"> Area Riservata </a> - Libri Eliminati </p>
     </div>
    <div id="corpo">
        <?php
        session_start();
        require_once 'connectDB.php';
        $reg = new connectDB();
        $openConnection = $reg -> accessDB();
        $connection = $reg -> getConnection();
        if(!$connection){
        	die("Errore nell'aprire il database");
        }
        else{
            foreach ($_POST as $key => $value)
                if($value=="del") {
                    $photo="photo/$key.jpg";
                    if(file_exists($photo))
                        unlink($photo);
                    $r=$connection->query("DELETE FROM copiaLibro WHERE codiceLibro=$key;");
                }
            echo "I libri sono stati eliminati";
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