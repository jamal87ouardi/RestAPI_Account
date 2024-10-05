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

function insertAccount($data){ 		
	$nom=$data["nom"];
	$prenom=$data["prenom"];
	$mail=$data["mail"];
	$pass=$data["pass"];

	
	$query="
		INSERT INTO Compte
		SET nom='".$nom."', 
		prenom='".$prenom."', 
		mail='".$mail."',
		motDePasse='".$pass."'
		";
	
    if( mysqli_query($this->getConnection(), $query)) {
		$messgae = "Account added Successfully.";
		$status = 1;			
	} else {
		$messgae = "Account added failed.";
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