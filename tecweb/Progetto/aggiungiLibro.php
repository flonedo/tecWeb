<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:index.php");
    }
    //Variabile per il messaggio di errore
    $allOk=true;
    $output = "";
    if(isset($_POST['submit'])){
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
            $note=$_POST["note"];
            $kinds;
            $state;
            $photo=true;
            $uploadOk = 1;
            // Check if image file is a actual image or fake image
            if(strlen($isbn)!=13 && strlen($isbn)!=0) {
                $output=$output."Il codice ISBN non è valido</br>";
                $allOk=false;
            }
            if(strlen($isbn)==0) {
                $output=$output."Il codice ISBN deve essere presente</br>";
                $allOk=false;
            }
            if(strlen($title)==0) {
                $output=$output."Il titolo deve essere presente</br>";
                $allOk=false;
            }
            if(strlen($editor)==0) {
                $output=$output."L'editore deve essere presente</br>";
                $allOk=false;
            }
            if(strlen($author)==0) {
                $output=$output."L'autore deve essere presente</br>";
                $allOk=false;
            }
            if(strlen($year)!=0) {
                if(!(is_numeric($year)) || (int)$year > date("Y")) {
                    $output=$output."L'anno non è valido</br>";
                    $allOk=false;
                } 
            }else{
                $year="NULL";
            }
            if(strlen($price==0)){
                $output=$output."Il prezzo non può essere nullo</br>";
                $allOk=false;
            }
            if(isset($_POST["kind"])) {
                $kinds=$_POST["kind"];
                if(count($kinds)>3) {
                    $output=$output."Selezionare al massimo 3 generi</br>";
                    $allOk=false;
                }  
            }else{
                $output=$output."Selezionare almeno un genere</br>";
                $allOk=false;
            }
            if(!isset($_POST["state"])){
                $output=$output."Selezionare lo stato</br>";
                $allOk=false;
            }else
                $state=$_POST["state"];
            if(file_exists($_FILES['photo']['tmp_name'])) {
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $output=$output."Il file non &egrave; un'immagine.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["photo"]["size"] > 2000000) {
                    $output = $output."La dimensione massima &egrave; 2 MB. Prova con un file di dimensione inferiore</br>";
                    $uploadOk = 0;
                }
                // Allow only jpg
                $allowed =  array('jpeg' ,'jpg');
                $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
                if(!in_array($ext,$allowed) ) {
                    $output=$output."Selezionare un file con estensione .gpg o .jpg<br/>";
                    $uploadOk = 0;
                }
            } else {
                $photo=false;
            }
            if ($allOk) {
                if(strlen($note)!=0)
                   $note="'$note'";
                else
                    $note="NULL";
                $query="INSERT INTO `libro` VALUES('$title', '$author', '$editor', '$isbn', $year);";
                    
                $connessione->query("INSERT INTO `libro` VALUES('$title', '$author', '$editor', '$isbn', $year);");
                    
                $r=$connessione->query("INSERT INTO `copiaLibro` (`ISBN`, `proprietario`, `prezzo`, `stato`, `note`, `foto`) VALUES('$isbn', '$user', $price, '$state', $note, 'noImage.jpg');");
                $id = $connessione->insert_id;
                foreach($kinds as $kind) {
                    $connessione->query("INSERT INTO `generelibro` VALUES('$id','$kind');");
                }
                if($photo) {
                    $target_dir = "photo/";
                    $target_file = $target_dir.$id.".jpg";
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                    $r=$connessione->query("UPDATE `copiaLibro` SET foto= '$id.jpg' WHERE codiceLibro='$id';");
                }
                $output = $output."Il libro &egrave stato inserito correttamente</br>";
            }
            //chiudo la connessione
            $reg -> closeConnection();
        }
    }

    $header = file_get_contents("headerPaginapersonale.html");
    $header = str_replace("<!--script-->", "<script type=\"text/javascript\" src=\"functions.js\"></script>", $header);
    $header = str_replace("<!--posizione -->", "<a href='index.php'> Home </a> - <a href='userHome.php'>Area personale </a> - Aggiungi Libro", $header);
    $header = str_replace("<!--titolo-->", "Aggiungi Libro - Scambio Libri Vi", $header);
    $menu = file_get_contents("menuPaginaPersonale.html");
    $header = str_replace("<!--menu-->", $menu, $header);
    $header = str_replace("<!--sottotitolo-->",$_SESSION["user"], $header);
    $footer = file_get_contents("footer.html");

    if(!isset($_POST['submit']) || $allOk==false) {
        $con = file_get_contents("aggiungiLibroCorpo.html");
        if($allOk==false)
            $con = str_replace("<!--messaggioErrore-->", "<div id=\"errore\" class=\"grass\"><p class=\"err\">".$output."</p></div>", $con);
    } else {
        $con = file_get_contents("corpo.html");
        $con = str_replace("<!--corpo-->", $output, $con);
    }
    echo $header;
    echo $con;
    echo $footer;
?>
