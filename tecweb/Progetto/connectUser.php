<?php
		class connectUser{
        
          //Eseguo tutte le operazioni per colegarmi al database
          const SERVER_NAME = "localhost";
          const USERNAME ="scambiolibrivi";
          const PASSWORD = "";
          const DATABASE = "my_scambiolibrivi";
        
          public $connessione;
        
          //Funzione per accedere al database
          public function accessDB(){
              $this->connessione = mysqli_connect(static::SERVER_NAME, static::USERNAME, static::PASSWORD, static::DATABASE);
              //Controllo che la connessione sia andata a buon fine
              if(!$this->connessione){
                  return NULL;
              }
              else{
                  return true;
              }
          }
    
    //Ritorna tue se è stato inserito correttamente
    public function verifySession(){   
        session_start();
        //Controllo che siano settate le corrette variabili
        if($_SESSION["user"]){
        	return true;
        }else{
        	return false;
        }
          
    }
 ?>