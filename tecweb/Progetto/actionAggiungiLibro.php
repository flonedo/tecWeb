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
        <p> Ti trovi in: <a href="index.php"> Home </a> - Aggiungi Libro </p>
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
        session_start();
        require_once 'connectDB.php';
        $reg = new connectDB();
        $openConnection = $reg -> accessDB();
        if(!$openConnection){
        	die("Errore nell'aprire il database");
        }
        else{
        	require_once 'connectRegister.php';
            $connessione= $reg -> getConnection();
            //creo un nuovo oggetto per eseguire la query nel database
            $user=$_SESSION["user"];
            $isbn = $_POST["isbn"];
            $title=$_POST["title"];
            $author=$_POST["author"];
            $editor=$_POST["editor"];
            $year=$_POST["year"];
            $price=$_POST["price"];
            $state=$_POST["state"];
            $note=$_POST["note"];
            $connessione->query("INSERT INTO `libro` (`titolo`, `autore`, `casaEditrice`, `ISBN`, `annoPubblicazione`) VALUES('$title', '$author', '$editor', '$isbn', $year);");
            $r=$connessione->query("INSERT INTO `copiaLibro` (`ISBN`, `proprietario`, `prezzo`, `stato`, `note`, `foto`) VALUES('$isbn', '$user', $price, '$state', '$note', 'noImage.jpg');"); 
            echo "Il libro &egrave stato inserito correttamente";
            $id = $connessione->insert_id;
            $target_dir = "photo/";
            $target_file = $target_dir.$id.".jpg";
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check file size
            if ($_FILES["photo"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow only jpg
            if($imageFileType != "jpg") {
                echo "Sorry, only JPG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 1 && move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $r=$connessione->query("UPDATE `copiaLibro` SET foto= '$id.jpg' WHERE codiceLibro='$id';");
            } else {
                echo "ma non &egrave stato possibile inserire l'immagine";
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