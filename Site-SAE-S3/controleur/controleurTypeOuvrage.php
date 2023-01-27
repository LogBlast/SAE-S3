<?php


require_once("modele/Modele.php");

// insertion du modèle TypeOuvrage
require_once("modele/TypeOuvrage.php");





// définition du contrôleur TypeOuvrage
class ControleurTypeOuvrage {
	
	protected static $objet = "TypeOuvrage";
	protected static $cle = "numTypeOuvrage";

	//Affichage des livres par type
    /*public static function OuvrageParType() {
		
    $tabTypes = array();
    $i=0;
    $counter = 0;
	
    // obtenir toutes les types
	
    $req = connexion::pdo()->query("SELECT * FROM TypeOuvrage");
    while ($cat = $req->fetch()) {
		
        $tabTypes[$cat["nomTypeOuvrage"]] = array();
    }
	
    $req->closeCursor();

    // obtenir les livres pour chaque type
	
    foreach ($tabTypes as $TypeOuvrage => $tabOuvrages) {
		
        $req = connexion::pdo()->prepare("SELECT Ouvrage.* FROM Ouvrage JOIN TypeOuvrage WHERE Ouvrage.numTypeOuvrage = TypeOuvrage.numTypeOuvrage");
		
        $req->execute(array("TypeOuvrage" => $TypeOuvrage));
		
        while ($ouvrage = $req->fetch()) {
			
            $tabTypes[$TypeOuvrage][] = $ouvrage;
        }
		
        $req->closeCursor();
    }


    // construire le tableau d'affichage pour chaque type
	
    $tabAff = array();

    

    $tabAff = array();

    foreach ($tabTypes as $TypeOuvrage => $tabOuvrages) {

        $tabAff[] = "<div class='TypeOuvrage'> <h2> $TypeOuvrage </h2> <div class='row'>";

        foreach ($tabOuvrages as $ouvrage) {
            //affiche les livres
            $tabAff[] = "<div>".$ouvrage["titreOuvrage"]."</div>";
            $tabAff[] = "<img src='".$ouvrage["lienImageOuvrage"]."' alt='Image de l'ouvrage'/>";

        }

        $tabAff[] = "</div> </div>";

    }
*/
	
	public static function OuvrageParType() {
    $tabTypes = array();
	$lien="routeur.php?controleur=controleurOuvrage&action=lireDetailsOuvrages";
    // Obtenir tous les types
    $req = connexion::pdo()->query("SELECT * FROM TypeOuvrage");
    while ($cat = $req->fetch()) {
        $tabTypes[$cat["nomTypeOuvrage"]] = array();
    }
    $req->closeCursor();

    // Obtenir les livres pour chaque type
    foreach ($tabTypes as $TypeOuvrage => $tabOuvrages) {
        $req = connexion::pdo()->prepare("SELECT Ouvrage.* FROM Ouvrage JOIN TypeOuvrage WHERE Ouvrage.numTypeOuvrage = TypeOuvrage.numTypeOuvrage AND TypeOuvrage.nomTypeOuvrage = :TypeOuvrage ");
        $req->execute(array("TypeOuvrage" => $TypeOuvrage));
        while ($ouvrage = $req->fetch()) {
            $tabTypes[$TypeOuvrage][] = $ouvrage;
        }
        $req->closeCursor();
    }

    // Construire le tableau d'affichage pour chaque type
    $tabAff[] = array();
	foreach ($tabTypes as $TypeOuvrage => $tabOuvrages) {
        $tabAff[] = "<div class='TypeOuvrage'> <h2> $TypeOuvrage </h2> <div class='row'>";
        foreach ($tabOuvrages as $ouvrage) {
            $tabAff[] = "<div> <a href=$lien>".$ouvrage["titreOuvrage"]." </a> </div>";
            $tabAff[] = "<img src='".$ouvrage["lienImageOuvrage"]."' alt='Image de l'ouvrage'/>";
        }
        $tabAff[] = "</div></div>";
    }

		
	require_once("vue/debut.php");
    include("vue/menu.html");
    include("vue/corps.php");
    include("vue/vueTypeOuvrage.php");
    include("vue/footer.html");
}
           


}
?>