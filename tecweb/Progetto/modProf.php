<?php 
  session_start(); 
  if(!isset($_SESSION["user"])){
    	header("Location:index.php");
    }
            require_once 'connectDB.php';
            $log = new connectDB();
            $openConnection = $log -> accessDB();
            $psw = "";
            $citta ="";
            $provincia="";
            $email="";
            $numeroT="";
            if(!$openConnection){
                die("Errore nell'aprire il database");
            }
            else{
        	//Devo andare a farmi dare la connessione
                $connection = $log -> getConnection();
                $user=$_SESSION["user"];
                $query="SELECT * FROM utente WHERE username=\"$user\";";
                $result=$connection->query($query);
                $row = $result->fetch_assoc();
                $psw = $row['password'];
                $citta=$row['citta'];
                $provincia=$row['provincia'];
                $email=$row['email'];
                $numeroT=$row['numeroTelefono'];
            }
            $header = file_get_contents("headerPaginapersonale.html");
            $footer = file_get_contents("footer.html");
            $header = str_replace("<!--posizione -->", "<a href='index.php'> Home </a> - <a href='userHome.php'>Area personale </a> - Modifica Profilo", $header);
            $con = file_get_contents("modProfCorpo.html");
            $header = str_replace("<!--titolo-->", "Modifica Profilo - Scambio Libri Vi", $header);
            $con = str_replace("<!--password-->", $psw, $con);
            $con = str_replace("<!--citta-->", $citta, $con);
            $con = str_replace("<!--provincia-->", $provincia, $con);
            $con = str_replace("<!--email-->", $email, $con);
            $con = str_replace("<!--telefono-->", $numeroT, $con);
            $menu = file_get_contents("menuPaginaPersonale.html");
            $header = str_replace("<!--menu-->", $menu, $header);
            $out = $_SESSION["user"];
            $header = str_replace("<!--sottotitolo-->",$out, $header);
            echo $header;
            echo $con;
            echo $footer;

?>
