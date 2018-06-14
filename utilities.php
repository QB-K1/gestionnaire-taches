<?php

function loadTasks ()
{
	// stocker dans variable : chemin d’accès d’un fichier et droits d’accès
	$file = fopen('task.csv', 'a+');

	// créer tableau vide
	$tab = array();

	//boucle pour afficher toutes les lignes en les parcourant
	while(true)
    {
        // Lecture d'une ligne du fichier CSV, donc d'une tâche.
        $line = fgetcsv($file);

        // Est-ce qu'on est à la fin du fichier ?
        if($line == false)
        {
          // Oui, fin de la boucle de lecture du fichier CSV.
          break;
        }

        // créé un nouvel index à la fin du tableau tab, qui a comme valeur la variable line
        array_push($tab, $line);

    }
    // renvoie le tableau, qui sera récupéré dans index.php d'où on appelle la fonction loadTasks
    return $tab;

 }

?>