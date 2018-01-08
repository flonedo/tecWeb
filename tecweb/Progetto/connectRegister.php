<?php
	
		class acceptNewUser{     	   
        	  //Ritorna true sse l'username inserito non è presente nel database
        	  public function verifyUser($user, $connection){
              	$query = "SELECT * FROM user WHERE username='".$user."'";
                $result = $connection->query($query);
                    //Controllo che la quesy sia stata eseguita correttamente
                    $rows = mysqli_num_rows($result);
                    if( $rows > 0){
                        return true;
                    }
                    else{
                      return null;
                    }
                }
              
              //Ritorna tue se è stato inserito correttamente
              public function acceptUser($connection, $user, $password, $nome, $cognome, $citta, $provincia, $email, $tel){   
                    //Controllo se il campo opzionale Tel è presente o meno
                    if($tel==""){
                       $tel= NULL;
                    }
                    //$query ="SELECT * FROM utente";
                    $query = "INSERT INTO utente VALUES ('".$user."', '".$password."','".$nome."', '".$cognome."', '".$citta."', '".$provincia."','".$email."',' ".$tel."')";
                    //Provo ad andare ad eseguire la query
                    $result = $connection->query($query);
                    //Controllo che la quesy sia stata eseguita correttamente
                    if($result){
                        return true;
                    }
                    else{
                      return null;
                    }
                }
              }
 ?>
   
    
