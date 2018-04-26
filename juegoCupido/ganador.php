<?php 

	require_once('puntaje.php');	

	if(!empty($_POST)){

		$pt = new Puntaje();

		$result = $pt->guardarPuntaje($_POST['username'],$_POST['email'],$_POST['aciertos']);
		
		if($result){

			echo 'true';
		}	
	}	







