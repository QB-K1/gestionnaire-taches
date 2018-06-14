<?php

// on récupère ce que user nous passe ($title, $description, $priority), on les passe à addTask qui va les transformer en donnée type tableau, les afficher et les passer à la fonction saveTask qui va les transférer dans le fichier CSV


// Récupère par méthode post les caractères entrés par user dans l'élément nommé 'title' et les stocke dans $title
$title = $_POST['title'];
// Affiche phrase contenant valeur de $title
echo '<p> Titre : ' .$title. '</p>';

$description = $_POST['description'];
echo '<p> Tâche : ' .$description. '</p>';

$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
echo '<p> Date de fin : ' .$day .'/' .$month .'/' .$year .'</p>' ;

//concaténer des variables en une seule
$dateFinale = $year."-".$month."-".$day;

$priority = $_POST['priority'];
echo '<p> Priorité : ' .$priority. '</p>';


function saveTask($nouvelleTache) {
	// stocker dans variable : chemin d’accès d’un fichier et droits d’accès (a+ place curseur à la fin donc écrira après le contenu actuel)
	$file = fopen('task.csv', 'a+');

	// Rajouter valeur de newline à la fin du document en dur qui correspond à la dernière ligne du tableau
	fputcsv($file, $nouvelleTache);
}


function addTask($titre, $tache, $dateDeFin, $priorite) {
	// créé un nouveau tableau correspondant à une ligne du tableau principal en écrivant le contenu de nos variables
    $newline = array($titre, $tache, $dateDeFin, $priorite);

	// print_r affiche des informations à propos d'une variable, de manière à ce qu'elle soit lisible
    print_r($newline);

    saveTask($newline);
}

addTask($title, $description, $dateFinale, $priority);

// sert à renvoyer à une page donnée à la fin du traitement
header('Location: index.php'); // renvoie à page du formulaire
exit(); // fin du programme

?>