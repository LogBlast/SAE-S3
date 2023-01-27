<?php


require_once("modele/Modele.php");

// insertion du modèle Editeur
require_once("modele/Editeur.php");





// définition du contrôleur Editeur
class ControleurEditeur {
	
	protected static $objet = "Editeur";
	protected static $cle = "numEditeur";

    public static function allInfosEditeur() {
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "les {$objet}s";
    $identifiant = static::$cle;
    $tab_obj = $classe::getAll();
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    foreach($tab_obj as $obj) {
      $n = $obj->get("nomEditeur");
      $a = $obj->get("adresseEditeur");

    $tabAff[] = "<div class='ligne'><div> Le siège social de la maison d'édition $n possède l'addresse $a";//rajouter des balises div pour la mise en forme
    }
    include("vue/debut.php");
    include("vue/menu.html");
	include("vue/corps.php");
    include("vue/vueEditeur.php");  //ca va surement change de nom
    include("vue/footer.html");
  
  }
}
?>