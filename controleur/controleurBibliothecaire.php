<?php


require_once("modele/Modele.php");

// insertion du modèle Bibliothecaire
require_once("modele/Bibliothecaire.php");





// définition du contrôleur Bibliothecaire
class ControleurBibliothecaire extends Controleur{
	
	protected static $objet = "les bibliothecaires";
	protected static $cle = "Bibliothecaire";

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
    public static function BiblioLesTitres() {
    
	$tabAff= ControleurOuvrage::LireLesTitres();
	
  }

}
?>