<?php
    session_start();
    //Controllo che sia stato fatto il login in precedenza
     if(!isset($_SESSION["user"])){
    	header("Location:index.php");
    }

        $output = "";
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
            
            $uploadOk = 1;
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $output=$output."File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check file size
            if ($_FILES["photo"]["size"] > 1500000) {
                $output = $output."La dimensione massima &egrave; 2 MB. Prova con un file di dimensione inferiore";
                $uploadOk = 0;
            }
            // Allow only jpg
            $allowed =  array('jpeg' ,'jpg');
            $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
                echo $imageFileType;//"Sorry, only JPG files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 1) {
                $connessione->query("INSERT INTO `libro` (`titolo`, `autore`, `casaEditrice`, `ISBN`, `annoPubblicazione`) VALUES('$title', '$author', '$editor', '$isbn', $year);");
                $r=$connessione->query("INSERT INTO `copiaLibro` (`ISBN`, `proprietario`, `prezzo`, `stato`, `note`, `foto`) VALUES('$isbn', '$user', $price, '$state', '$note', 'noImage.jpg');");
                $id = $connessione->insert_id;
                $target_dir = "photo/";
                $target_file = $target_dir.$id.".jpg";
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                $r=$connessione->query("UPDATE `copiaLibro` SET foto= '$id.jpg' WHERE codiceLibro='$id';");
                $output = $output."<p>Il libro &egrave stato inserito correttamente</p>";
            }
        }  

    $header = file_get_contents("headerPaginapersonale.html");
    $footer = file_get_contents("footer.html");
    $header = str_replace("<!--posizione -->", "<a href='index.php'> Home </a> - <a href='userHome.php'>Area personale </a> - Elimina profilo", $header);
    $con = file_get_contents("corpo.html");
    $con = str_replace("<!--corpo-->", $output, $con);
    $header = str_replace("<!--titolo-->", "Aggiungi Libro - Scambio Libri Vi", $header);
    $out = $_SESSION["user"];
    $header = str_replace("<!--sottotitolo-->",$out, $header);
    echo $header;
    echo $con;
    echo $footer;
?>