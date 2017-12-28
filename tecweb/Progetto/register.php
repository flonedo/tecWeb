<?php


//Funzione per vedere se dentro al database è già presente un utente con quell'user
 $servername = "localhost";
    $username ="scambiolibrivi";
    $password = " ";
    $database = "my_scambiolibrivi";
	
    $q = $_REQUEST["q"];
    
    //Creo una nuova connessione
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error){
        die("Connessione fallita: ". $conn->connect_error);
    }
    
	//devo realizzare una query all'interno del mio database
     $user = "SELECT username FROM utente WHERE username='$q'";
     $result = $conn->query($user);

     if($result -> num_rows > 0)
          echo "Utente già presente";
      else
        echo " ";

?>