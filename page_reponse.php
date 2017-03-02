<?php

	if (count($_POST['reponse']) == 1){
	
		foreach($_POST['reponse'] as $repondu)

		foreach($_POST['bonne_reponse'] as $b_reponse)

		
		if ($repondu == $b_reponse){
			echo "<h1>Correct answer</h1>";
		}
		if ($repondu != $b_reponse){
			echo "<h1>Wrong answer</h1>";
		}
	}
	else{
		echo "<h1>Check one box</h1>";
	}
?>