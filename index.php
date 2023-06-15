<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/authentification.css">
	<link rel="stylesheet" href="Content/css/header.css">
	<link rel="stylesheet" href="Content/css/formulaire_inscription.css">
	<link rel="stylesheet" href="Content/css/accueil.css">
	<link rel="stylesheet" href="Content/css/theme.css">
	<link rel="stylesheet" href="Content/css/profil.css">
	<link rel="stylesheet" href="Content/css/modif_profil.css">
	<link rel="stylesheet" href="Content/css/quizz.css">
	<link rel="stylesheet" href="Content/css/timer.css">
	

	<script src="content/js/script.js" defer></script>
	
	<title>Index</title>
</head>
<body>
<?php

	require_once 'Controllers/Controller.php';
	require_once 'Models/Model.php';
	
	
	$controllers=["accueil", "authentification", "inscription", "selection", "quizz", "profil"];
	$controller_default="authentification"; 
	$controller_with_header=["accueil", "selection", "quizz", "profil"];

	if (isset($_GET['controller']) and in_array($_GET['controller'],$controllers))
	{
		$nom_controller=$_GET['controller'];
		
	}
	else
	{
		$nom_controller=$controller_default;
	}


	if (in_array($_GET['controller'],$controller_with_header)) {

		require_once 'Utils/header.php';
	}

	$nom_classe="Controller_".$nom_controller;
	$nom_fichier="Controllers/".$nom_classe.".php";

	if (file_exists($nom_fichier))
	{
		require_once($nom_fichier);
		$controller=new $nom_classe();
		
	}
	else
	{
		exit("Error 404 : not found");
	}


	
	 ?>

</body>
</html>