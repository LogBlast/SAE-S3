<?php


require_once("modele/Modele.php");

// insertion du modèle Dessinateur
require_once("modele/Dessinateur.php");





// définition du contrôleur Dessinateur
class ControleurDessinateur {
	
	protected static $objet = "dessinateur";
	protected static $cle = "numDessinateur";

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
    	 public static function allInfosDessinateur() {
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "les {$objet}s";
    $identifiant = static::$cle;
    $tab_obj = $classe::getAll();
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    foreach($tab_obj as $obj) {
      $n = $obj->get("nomDessinateur");
      $p = $obj->get("prenomDessinateur");
	  $d = $obj->get("dateNaissanceDessinateur");

    $tabAff[] = "<div class='ligne'><div> le dessinateur $n $p est né le $d";//rajouter des balises div pour la mise en forme
    }
    
}
}
?>