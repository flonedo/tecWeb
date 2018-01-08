<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Chi Siamo - ScambioLibriVi </title>
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
       <?php
        session_start();
          if(!isset($_SESSION["user"])){
            echo'    <div id="logForm">
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
            </div>';
          }
        else
            echo '<a class="abutt" id="aPers" href="userHome.php" title="Vai alla tua pagina personale"> Pagina Personale </a> </br>
                  <a class="abutt" id="logout" href="logout.php" title="Esci"> Logout </a>'
     ?>
  </div>
  	 <div id="where">
        <p> Ti trovi in: <a href="index.php" > Home  </a> - Chi siamo</p>
     </div>
     <div id = "menu">
        <ul>
            <li>  <a href="index.php"> <span xml:lang="en"> Home</a> </span>  </li>
            <li  id="current" class="centrali">  Chi Siamo </a></li>
            <li class="centrali">  <a href="contact.php"> Contattaci </a> </li>
            <li class="ultimo"> <a href="catalogo.php"> Catalogo </a> </li>
        </ul>
    </div>
    <div id="corpo">
    <p class="corpCS">
    	ScambioLibriVI &egrave; un progetto di Francesca, Luca e Marco, tre studenti di Informatica dell'Univerist&agrave; degli
        Studi di Padova uniti dalla passione per i libri.
    </p>
    <p class="corpCS">    L'idea nasce dalla nostra esperienza universitaria: la pratica di scambiare libri a mano, sebbene molto diffusa, 
        non &egrave; supportata da piattaforme specializzate che mettano in contatto i vari utenti; vendere e comprare
        libri &egrave; dunque un 
        processo lungo e complesso, spesso affidato al passaparola, ai volantini e alla fortuna.
    </p>
    <p class="corpCS">    Estendendo il concetto ad ogni genere di libro, abbiamo deciso di creare una piattaforma di semplice utilizzo che
        metta in contatto direttamente i venditori e gli acquirenti, che potranno stabilire autonomamente le modalit&agrave;
        di scambio senza passare attraverso intermediari.
    </p> 
    <img id="immdm" src="images/logoDM.png" alt="Semplice immagine di un libro"/>
    <img id="immUni" src="images/unipd.jpg" alt="Logo dell'Università di Padova"/>
    </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
    
	<body>


</body>
</html>