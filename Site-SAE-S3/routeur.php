<?php


require_once("config/connexion.php");

Connexion::connect();

require_once("controleur/controleur.php");
require_once("controleur/controleurOuvrage.php");
require_once("controleur/controleurBibliothecaire.php");
require_once("controleur/controleurAdministrateur.php");
require_once("controleur/controleurEditeur.php");
require_once("controleur/controleurDessinateur.php");


    $controleur = "controleurOuvrage";
	$action = "lireLesOuvrages";
	
	
	$tableauControleurs = ["controleurBibliothecaire","controleurAdministrateur","controleurTousLesOuvrages","controleurTousLesTypes","controleurToutesLesCategories","controleurBibliothecaire","controleurAdministrateur","controleurDessinateur","controleurEditeur","controleurEmprunteur","controleurCatégorie","controleurTypeOuvrage"];
	
	
	$actionParDefaut = array(
	
		"controleurOuvrage" => "lireAccueil",
		"controleurOuvrage" => "lireLesOuvrages",
		"controleurTousLesTypes" => "liresObjets",
		"controleurToutesLesCategories" => "liresObjets",
		"controleurBibliothecaire" => "BiblioLesTitres",
		"controleurAdministrateur" => "AdministrateurInfosOuvrages",
		"controleurEditeur" => "allInfosEditeur",
		"controleurDessinateur" => "allInfosDessinateur",
		"controleurCatégorie" => "OuvrageParCategorie",
		"controleurTypeOuvrage" => "OuvrageParType",
		"controleurEmprunteur" => "connecter",
		"controleurEmprunteur"=>"creerEmprunteur",
		"controleurEmprunteur"=>"afficherFormulaireCreationEmprunteur",
		"controleurEmprunteur"=>"afficherFormulaireModificationEmprunteur",
		"controleurEmprunteur"=>"modifierEmprunteur",
		"controleurEmprunteur"=>"lireInfosEmprunteurs"
		
		
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