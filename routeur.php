<?php


require_once("config/connexion.php");

Connexion::connect();

require_once("controleur/controleur.php");
require_once("controleur/controleurOuvrage.php");
require_once("controleur/controleurBibliothecaire.php");
require_once("controleur/controleurAdministrateur.php");
require_once("controleur/controleurEmprunteur.php");

    $controleur = "controleurEmprunteur";
	$action = "GererEmprunteur";
	$tableauControleurs = ["controleurEmprunteur","controleurBibliothecaire","controleurAdministrateur","controleurTousLesOuvrages","controleurTousLesTypes","controleurToutesLesCategories","controleurBibliothecaire","controleurAdministrateur"];
	$actionParDefaut = array(
		"controleurOuvrage" => "lireObjets",
		"controleurTousLesOuvrages" => "lireLesOuvrage",
		"controleurTousLesTypes" => "liresObjets",
		"controleurToutesLesCategories" => "liresObjets",
		"controleurBibliothecaire" => "BiblioLesTitres",
		"controleurAdministrateur" => "AdministrateurInfosOuvrages"
		"controleurEmprunteur" => "GererEmprunteur"
	);
	
  if (isset($_GET["controleur"]) && in_array($_GET["controleur"],$tableauControleurs)) {
    $controleur = $_GET["controleur"];
  }
	require_once("controleur/controleur.php");
	require_once("controleur/$controleur.php");
	if (isset($_GET["action"]) && in_array($_GET["action"],get_class_methods($controleur))) {
    $action = $_GET["action"];
  } else {
		$action = $actionParDefaut[$controleur];
	}

	$controleur::$action();


?>