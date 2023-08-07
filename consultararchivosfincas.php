<?php
	$connect = mysqli_connect("localhost", "root", "", "sistema");
	
	$id_predio = $_GET['id_predio'];

	$sql = "SELECT * FROM archivospredios WHERE id_predio= $id_predio ";
	$result = mysqli_query($connect, $sql);
	$jsondata = array();
	$jsondata["trabajadores"] = array();
	while($row = mysqli_fetch_array($result))
	{
		$jsondata["trabajadores"][] = $row;
	}
	header('Content-type: application/json; charset=utf-8');	
	echo json_encode($jsondata, JSON_FORCE_OBJECT);

?>