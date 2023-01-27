<?php


require_once("modele/Modele.php");

// insertion du modèle Dessinateur
require_once("modele/Dessinateur.php");

// définition du contrôleur Dessinateur
class ControleurDessinateur {
	
	protected static $objet = "Dessinateur";
	protected static $cle = "numDessinateur";
  
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

    $tabAff[] = "<div class='ligne'><div> Le dessinateur $n $p est né le $d";//rajouter des balises div pour la mise en forme
    }
    include("vue/debut.php");
    include("vue/menu.html");
	include("vue/corps.php");
    include("vue/vueDessinateur.php");  //ca va surement change de nom
    include("vue/footer.html"); 
}
}
?>