<?php 
	 class connectDB{
          const HOST_DB="localhost";
          const USERNAME="scambiolibrivi";
          const PASSWORD=" ";
          const DATABASE_NAME="my_scambiolibrivi";

          public $connessione;

          public function accessDB(){
          //Mi permette di connettermi a db
          $this->connessione = mysqli_connect(static::HOST_DB, static::USERNAME, static::PASSWORD, static::DATABASE_NAME);

           //Test se la connessione e' andara a buon fine o meno
             if(!$this->connessione){
                  return false;
              }
              else{
                  return true;
             }
          }

          public function closeConnection(){
              if($this->connessione){
                   mysqli_close ( $this -> connessione );
                   return true;
               }
               else{
                return false;
                }
          }

          public function getConnection(){
            return $this->connessione;
          }
    }
?>