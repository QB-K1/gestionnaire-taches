<?php
include 'utilities.php';

function removeTasks(array $allTasks, array $indexes) {
	// créé tableau contenu dans newTab, que je vais récupérer une fois la comparaison terminée
	$newTab = [];
	// parcours tableau de toutes les tâches en assignant clés et valeurs
	foreach ($allTasks as $index => $taskData){
		// si valeur de la variable index n'existe pas dans le tableau indexes qui est le tableau des index à supprimer
		if (in_array($index, $indexes) == false) {
			// alors l'affiche sa valeur dans le tableau final
			array_push($newTab, $taskData);
		}
	}
	// renvoie tableau final, récupéré dans dernière instruction dans la variable finalTab du if 
	return $newTab;
}


function saveTasks(array $finalTab) {

	// stocker dans variable : chemin d’accès d’un fichier et droits d’accès. w = supprime contenu déjà existant
	$file = fopen('task.csv', 'w');
	// parcours tableau final en ne gardant que valeur de l'élément courant
	foreach ($finalTab as $value) {
		// écris dans le fichier csv les valeurs  
		fputcsv($file, $value);
	}
	fclose($file); // indique qu'a fini de modifier $file
}



//-----------------------------------------------------------------------
//------------------------ Début de la lecture --------------------------
//-----------------------------------------------------------------------


// Si les éléments qui comportent 'indexes' (éléments à supprimer (checkbox puis bouton supprimer)) sont bien récupérés par méthode post
if(array_key_exists('indexes', $_POST) == true)
{
	// créé tableau des index à supprimer
	$indexes = $_POST['indexes'];
  	
  	// l'affiche
	print_r($indexes);
 
   	// saute une ligne dans l'affichage
  	echo '<p></p>';

	// créé variable avec liste complète des tâches
	$allTasks = loadTasks();

	// l'affiche
	print_r($allTasks);

	// saute une ligne dans l'affichage
	echo '<p></p>';
	
	// rentre dans nouvelle variable l'appel de la fonction removeTasks et lui passe en argument la liste complète des tâches et la liste des index à supprimer
	$finalTab = removeTasks($allTasks, $indexes);
	
	// l'affiche
	print_r($finalTab);

	// appelle fonction qui réécrit nouvelle liste et lui passe tableau final
	saveTasks($finalTab);
}

header('Location: index.php'); // renvoie à page du formulaire
exit(); // fin du programme

?>