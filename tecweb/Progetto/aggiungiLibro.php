<?php
  session_start();
  if(!isset($_SESSION["user"])){
    	header("Location:index.php");
    }
    
            $header = file_get_contents("headerPaginapersonale.html");
            $footer = file_get_contents("footer.html");
            $header = str_replace("<!--posizione -->", "<a href='index.php'> Home </a> - <a href='userHome.php'>Area personale </a> - Aggiungi Libro", $header);
            $con = file_get_contents("aggiungiLibroCorpo.html");
            $header = str_replace("<!--titolo-->", "Aggiungi Libro - Scambio Libri Vi", $header);
            $out = $_SESSION["user"];
            $header = str_replace("<!--sottotitolo-->",$out, $header);
            echo $header;
            echo $con;
            echo $footer;
?>
