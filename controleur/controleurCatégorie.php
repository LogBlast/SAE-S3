<?php


require_once("modele/Modele.php");

// insertion du modèle Catégorie
require_once("modele/Catégorie.php");





// définition du contrôleur Catégorie
class ControleurCatégorie {
	
	protected static $objet = "les catégories";
	protected static $cle = "Catégorie";

  // la méthode de récupération de l'utilisateur
  // dont le login est passé en GET
  
  public static function lireUtilisateur() {
    $titre = "un utilisateur";
    $l = $_GET["login"];
    $obj = Utilisateur::getObjetById($l);;
    include("vue/debut.php");
    include("vue/menu.html");
    if (!$obj){
		$messageErreur ="Oups une erreur s'est produite :(";
		$messageErreur .="l'utilisateur de login $l n'existe pas dans la base !";
		
      include("vue/erreur.php");
    }
	else
      include("vue/unObjet.php");
    include("vue/fin.html");
  }

}
?>