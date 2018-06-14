<?php

include 'utilities.php';

$tasks = loadTasks();
// comme loadTasks renvoie un tableau, celui-ci va devenir valeur de $tasks et pint_r va l'afficher en dur dans le HTML
	//print_r($tasks);

// créer un objet date, va donner le timestamp du jour 
$now = date_create();

include 'index.phtml';
?>