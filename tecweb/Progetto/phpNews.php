<?php
	class News{
    	public function getNews($connection){
        //Faccio la query per andarmi a prendere gli ultimo 10 inserimenti
        $query = "SELECT codiceLibro, titolo FROM copiaLibro JOIN libro ON copiaLibro.ISBN = libro.ISBN ORDER BY codiceLibro DESC LIMIT 10";
        //faccio la query
        $result = mysqli_query($connection, $query) or die ("Errore le fare la query");
        //vado a vedere se ha prodotto risultato
        if(mysqli_num_rows($result)>0){
        	$output = array();
            while($row = mysqli_fetch_assoc($result)){
            	$arrayResult = array("codiceLibro" =>  $row['codiceLibro'],
                					 "titolo" => $row['titolo']);
                array_push($output, $arrayResult);
            }
            return $output;
        }
        else{
        	return null;
        }
    }
  }
?>