<?php

//insertion des modeles

require_once("modele/Modele.php");
require_once("modele/Abonnement.php");
require_once("modele/Administrateur.php");
require_once("modele/Auteur.php");
require_once("modele/Bibliothecaire.php");
require_once("modele/Catégorie.php");
require_once("modele/Dessinateur.php");
require_once("modele/Editeur.php");
require_once("modele/Emprunteur.php");
require_once("modele/Exemplaire.php");
require_once("modele/Langue.php");
require_once("modele/Ouvrage.php");
require_once("modele/TypeOuvrage.php");

//définition du contrôleur générique
class Controleur {
	 
	public static function lireObjets() {
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "les {$objet}s";
    $identifiant = static::$cle;
	//$lienImage=static::$image;
    $tab_obj = $classe::getAll();
	
	
	
	
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    foreach($tab_obj as $obj) {
      $id = $obj->get($identifiant);
	$tabAff[] = "<div class='ligne'><div>$objet $id";    
    }
	include("vue/debut.php");
    include("vue/menu.html");
    include("vue/lesObjets.php");
    include("vue/fin.html");
  }

}
?>