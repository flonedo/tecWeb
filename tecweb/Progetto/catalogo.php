<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>
	<title> Home - ScambioLibriVi </title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="Scambio Libri Vi" />
        <meta name="description" content="Sito dedicato allo scambio di libri usati, pensato per la provincia di Vicenza e dintorni" />
	<link rel="stylesheet" type="text/css" href="style/style.css" media="handheld, screen"/>
	<link  rel = "stylesheet" type="text/css" href="small.css" media= "handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" />		<link rel = "stylesheet" type="text/css"  href="print.css" media="print"/> 
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
        <p> Ti trovi in: <a href="index.php"> Home</a> - Catalogo </p>
     </div>
     <div id = "menu">
        <ul>
            <li>  <a href="index.php"> <span xml:lang="en"> Home </span>  </a> </li>
            <li class="centrali">  <a href="chisiamo.html">Chi Siamo </a></li>
            <li class="centrali">  <a href="contact.html"> Contattaci </a> </li>
            <li  id="current" class="ultimo">  Catalogo </li>
        </ul>
    </div>
    <div id="corpo">
    <h1 id="titleCat"> Il nostro catalogo </h1>
    <h2 id="subtitleCat"> Scegli una categoria di libri e comincia a sfogliare il nostro catalogo! </h2>
    <!--CORPO DEL CATALOGO -->
    <!-- DEVE RESTITUIRE LA LISTA DEI LIBRI -->
    <?php
      //Connesione al database
      require_once 'connectDB.php';
        $reg = new connectDB();
        $openConnection = $reg -> accessDB();
        if(!$openConnection){
          die("Errore nell'aprire il database");
        }
        else{
          //Devo andare ad eseguire le operazioni per tirare giu' le prime 10 novita'
            //Vado a richiedere il file .php che mi consente di eseguire l'operazione
            require_once 'controllerCatalogo.php';
            $controller = new controllerCatalogo();
            //vado a richedere a reg di darmi la connessione dove operare
            $connection = $reg-> getConnection();
            //Vado ad eseguire la query che mi ritorna un array associativo dei risultati
            $results = $controller -> estraiGeneri($connection);

            if($results){
              $output = '<ul id="cata">';
                $index = 0;
                foreach($results as $array){
                  //$output = $output.'<li> <a href="schedaLibro.php?id='.$array["codiceLibro"].'" class="scheda" title="Vai alla scheda del libro"'.$array["titolo"].'">'.$array["titolo"].'</a></li>';
                  if($index == 0){
                    $output = $output."<li id='primoCata'> <a  href = elencoTitoli.php?id=".$array['id'].">".$array['nome']."</a></li>";
                    $index = $index+1;
                  }
                  else{
                  	$output = $output."<li> <a href = elencoTitoli.php?id=".$array['id'].">".$array['nome']."</a></li>";
                  }
                }
                echo $output.'</ul>
                <a href="#titleCat" id="tornaSuCata"> Torna su </a>';
            }
            else{
              echo "<p> Non ci sono nuovi inserimenti </p>";
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
