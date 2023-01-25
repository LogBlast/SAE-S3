<?php


require_once("modele/Modele.php");

// insertion du modèle Emprunteur
require_once("modele/Emprunteur.php");





// définition du contrôleur Emprunteur
class ControleurEmprunteur {
	
	protected static $objet = "les emprunteurs";
	protected static $cle = "Emprunteur";

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
		 public static function GererEmprunteur() {
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $identifiant = static::$cle;
    $tab_obj = $classe::getAll();
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    foreach($tab_obj as $obj) {
      $id = $obj->get($identifiant);
      $n = $obj->get("nomEmprunteur");
      $p = $obj->get("prenomEmprunteur");


    $tabAff[] = "<div class='ligne'><div> $id, $n, $p";//rajouter des balises div pour la mise en forme
    }
	include("vue/debut.php");
    include("vue/menu.html");
	include("vue/corps.html");
    include("vue/vueGererEmprunteur.php");  //ca va surement change de nom
    include("vue/footer.html");
  
  }
}
?>