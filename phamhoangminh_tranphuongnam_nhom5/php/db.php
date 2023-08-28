<?php 

function executeQuery($sqlQuery, $fetchAll = true){
	$host = "127.0.0.1";
	$dbname = "web2013";
	$dbusername = "root";
	$dbpassword = "123456"; 

	try{
		$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);	
		

	}catch(Exception $ex){
		var_dump($ex->getMessage());
		die;
	}


	$stmt = $connect->prepare($sqlQuery);


	$stmt->execute();

	if($fetchAll == true){
		return $stmt->fetchAll();
	}

	return $stmt->fetch();
}


 ?>