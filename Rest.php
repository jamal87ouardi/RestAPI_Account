<?php

class Rest {

function getConnection() {
    $servername = "sql108.ezyro.com";
    $username = "ezyro_37440458";
    $password = "beja@d2014";
    $dbname = "ezyro_37440458_db1";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    return $conn;

}

function insertMovie($data){ 		
	$movieId=$data["id"];
	$movieTitle=$data["title"];
	$movieImg=$data["image"];
	
	$query="
		INSERT INTO Movie
		SET id='".$movieId."', 
		title='".$movieTitle."', 
		image='".$movieImg."'
		";
	
    if( mysqli_query($this->getConnection(), $query)) {
		$messgae = "Movie added Successfully.";
		$status = 1;			
	} else {
		$messgae = "Movie added failed.";
		$status = 0;			
	}
	$empResponse = array(
		'status' => $status,
		'status_message' => $messgae
	);
	header('Content-Type: application/json');
	echo json_encode($empResponse);
}

function getAll() {

	
	$query = "
		SELECT id, nom, prenom, mail, motDePasse 
		FROM Compte ";	
	$resultData = mysqli_query($this->getConnection(), $query);
	$compteData = array();
	while( $record = mysqli_fetch_assoc($resultData) ) {
		$compteData[] = $record;
	}
	header('Content-Type: application/json');
    
	echo json_encode($compteData);	

}




}

?>