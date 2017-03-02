<?php
	echo "<!doctype html>";
    echo "<html>";
    echo "<head>";
    echo '<meta charset="utf-8" />';
    echo "<title>English quiz</title>";
    echo "</head>";
    echo "<body>";

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projetangl;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	
	$question_bd = $bdd->query('SELECT `enonce`,`id_reponse` FROM `question` WHERE `id`=1');
	
	$question = $question_bd -> fetch();
	$id_reponse_correct = $question['id_reponse'];
	
	echo "<h1>".$question['enonce']."</h1>";
	//echo "</br>";
	
	//chargment de la reponse correct
	$bd_reponse_correct = $bdd->query('SELECT `intitule_reponse` FROM `reponse` WHERE `id`='.$id_reponse_correct);
	$reponse_correct = $bd_reponse_correct -> fetch();
	
	//chargement des autres réponses
	$bd_nb_reponse_total = $bdd->query('SELECT COUNT(*) FROM reponse');
	$tab_nb_reponse_total = $bd_nb_reponse_total -> fetch();
	$nb_reponse_total = $tab_nb_reponse_total['COUNT(*)'];
	
	$tab_reponse =array(1=>$reponse_correct['intitule_reponse'], 2=>"reponse2", 3=>"reponse3", 4=>"reponse4" );
	$id_use = array(1=>$id_reponse_correct, 2=>0, 3=>0, 4=>0);
	$cont = 2;
	while ($cont != 5){
		$id2 = $id_use[2];
		$id3 = $id_use[3];
		$id4 = $id_use[4];
		$id = rand(1, $nb_reponse_total);
		if ($id != $id_reponse_correct && $id != $id2 && $id != $id3 && $id != $id4){
			$bd_tmp = $bdd->query('SELECT `intitule_reponse` FROM `reponse` WHERE `id`='.$id);
			$tmp = $bd_tmp -> fetch();
			$tab_reponse[$cont] = $tmp['intitule_reponse'];
			$id_use[$cont] = $id;
			$cont = $cont+1;
		}
		
	}
	
	$r = rand(1,12);
	
	switch ($r){
		case 1:
			$reponse1 = $tab_reponse[1];
			$reponse2 = $tab_reponse[2];
			$reponse3 = $tab_reponse[3];
			$reponse4 = $tab_reponse[4];
			$b_reponse = 1;
			break;
			
		case 2:
			$reponse1 = $tab_reponse[2];
			$reponse2 = $tab_reponse[1];
			$reponse3 = $tab_reponse[3];
			$reponse4 = $tab_reponse[4];
			$b_reponse = 2;
			break;
			
		case 3:
			$reponse1 = $tab_reponse[2];
			$reponse2 = $tab_reponse[3];
			$reponse3 = $tab_reponse[1];
			$reponse4 = $tab_reponse[4];
			$b_reponse = 3;
			break;
			
		case 4:
			$reponse1 = $tab_reponse[2];
			$reponse2 = $tab_reponse[3];
			$reponse3 = $tab_reponse[4];
			$reponse4 = $tab_reponse[1];
			$b_reponse = 4;
			break;

		case 5:
			$reponse1 = $tab_reponse[3];
			$reponse2 = $tab_reponse[2];
			$reponse3 = $tab_reponse[4];
			$reponse4 = $tab_reponse[1];
			$b_reponse = 4;
			break;
			
		case 6:
			$reponse1 = $tab_reponse[3];
			$reponse2 = $tab_reponse[4];
			$reponse3 = $tab_reponse[2];
			$reponse4 = $tab_reponse[1];
			$b_reponse = 4;
			break;
			
		case 7:
			$reponse1 = $tab_reponse[3];
			$reponse2 = $tab_reponse[4];
			$reponse3 = $tab_reponse[1];
			$reponse4 = $tab_reponse[2];
			$b_reponse = 3;
			break;
			
		case 8:
			$reponse1 = $tab_reponse[4];
			$reponse2 = $tab_reponse[3];
			$reponse3 = $tab_reponse[1];
			$reponse4 = $tab_reponse[2];
			$b_reponse = 3;
			break;
		case 9:
			$reponse1 = $tab_reponse[4];
			$reponse2 = $tab_reponse[1];
			$reponse3 = $tab_reponse[3];
			$reponse4 = $tab_reponse[2];
			$b_reponse = 2;
			break;
			
		case 10:
			$reponse1 = $tab_reponse[4];
			$reponse2 = $tab_reponse[1];
			$reponse3 = $tab_reponse[2];
			$reponse4 = $tab_reponse[3];
			$b_reponse = 2;
			break;
			
		case 11:
			$reponse1 = $tab_reponse[1];
			$reponse2 = $tab_reponse[4];
			$reponse3 = $tab_reponse[2];
			$reponse4 = $tab_reponse[3];
			$b_reponse = 1;
			break;
			
		case 12:
			$reponse1 = $tab_reponse[1];
			$reponse2 = $tab_reponse[2];
			$reponse3 = $tab_reponse[4];
			$reponse4 = $tab_reponse[3];
			$b_reponse = 1;
			break;
		
	}
	
	echo '<form action="page_reponse.php" method="post">
		<p>
			<input type="checkbox" name="reponse[]" value ="1" /> <label for="reponse">'.$reponse1.'</label>
			<input type="checkbox" name="reponse[]" value ="2" /> <label for="reponse">'.$reponse2.'</label>
			<input type="checkbox" name="reponse[]" value ="3" /> <label for="reponse">'.$reponse3.'</label>
			<input type="checkbox" name="reponse[]" value ="4" /> <label for="reponse">'.$reponse4.'</label>
			</br>
			<input type="hidden" name="bonne_reponse[]" value='.$b_reponse.' />
			<input type="submit" value="Send" />
		</p>
	</form>';
	
	echo "</body>";
?>