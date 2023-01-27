<?php


require_once("modele/Modele.php");

// insertion du modèle Catégorie
require_once("modele/Catégorie.php");





// définition du contrôleur Catégorie
class ControleurCatégorie extends Controleur{
	
	protected static $objet = "Catégorie";
	protected static $cle = "numCatégorie";

  	/*public static function OuvrageParCategorie() {
    $objet = "Catégorie";
    $classe = ucfirst($objet);
    $tab_obj = $classe::getAll();
    $tabCategories = array();
    $i = 0;

    // regrouper les livres par catégorie
    foreach($tab_obj as $obj) {
        $categorie = $obj->get("nomCatégorie");
        if(!array_key_exists($categorie, $tabCategories)) {
            $tabCategories[$categorie] = array();
        }
        $tabCategories[$categorie][] = $obj;
    }

    // construire le tableau d'affichage pour chaque catégorie
    $tabAff = array();
    foreach($tabCategories as $categorie => $tabOuvrages) {
        $tabAff[] = "<div class='Catégorie'> <h2> $categorie </h2> <div class='row'>";
        for($i = 0; $i < count($tabOuvrages); $i += 2) {
            $Ouvrage1 = $tabOuvrages[$i];
			
			$numCatégorie = $obj->get("numCatégorie");
			
			$requete_preparee = "SELECT Ouvrage.numOuvrage, Ouvrage.nomOuvrage , Ouvrage.lienImageOuvrage
			FROM Ouvrage 
			JOIN appartient_à ON Ouvrage.numOuvrage = appartient_à.numOuvrage 
			WHERE appartient_à.numCatégorie = :numCatégorie_tag;";
			
			$req_prep = connexion::pdo()->prepare($requete_preparee);
			

			$req_prep->execute();
			$req_prep->setFetchMode(PDO::FETCH_CLASS,"Catégorie");
			
			
			
			
			
            $Ouvrage1info = Connexion::pdo()->prepare('SELECT Ouvrage.numOuvrage, Ouvrage.nomOuvrage , Ouvrage.lienImageOuvrage
			FROM Ouvrage 
			JOIN appartient_à ON Ouvrage.numOuvrage = appartient_à.numOuvrage 
			WHERE appartient_à.numCatégorie = :numCatégorie');
			
			$Ouvrage1info = $Ouvrage1info->fetchAll();
			
			echo "<div>".$Ouvrage1info["nomOuvrage"]."</div>";
    		echo "<div>".$Ouvrage1info["lienImageOuvrage"]."</div>";
		}
	}
            $tabAff[] = "</div>";
			
			
            
			
            $tabAff[] = "</div>";
        
	require_once("vue/debut.php");
    include("vue/menu.html");
    include("vue/vueCatégorie.php");
    include("vue/footer.html");
}
}*/
	
	
	
	
	
	//Affichage des livres par categorie
    public static function OuvrageParCategorie() {
		
    $tabCategories = array();
    $i=0;
    $counter = 0;
	$lien="routeur.php?controleur=controleurOuvrage&action=lireDetailsOuvrages";
    // obtenir toutes les catégories
	
    $req = connexion::pdo()->query("SELECT * FROM Catégorie");
    while ($cat = $req->fetch()) {
		
        $tabCategories[$cat["nomCatégorie"]] = array();
    }
	
    $req->closeCursor();

    // obtenir les livres pour chaque catégorie
	
    foreach ($tabCategories as $categorie => $tabOuvrages) {
		
        $req = connexion::pdo()->prepare("SELECT Ouvrage.* FROM Ouvrage JOIN appartient_à ON Ouvrage.numOuvrage = appartient_à.numOuvrage WHERE appartient_à.numCatégorie = (SELECT numCatégorie FROM Catégorie WHERE nomCatégorie = :categorie)");
		
        $req->execute(array("categorie" => $categorie));
		
        while ($ouvrage = $req->fetch()) {
			
            $tabCategories[$categorie][] = $ouvrage;
        }
		
        $req->closeCursor();
    }


    // construire le tableau d'affichage pour chaque catégorie
	
    $tabAff = array();

    

    $tabAff = array();

    foreach ($tabCategories as $categorie => $tabOuvrages) {

        $tabAff[] = "<div class='Catégorie'> <h2> $categorie </h2> <div class='row'>";

        foreach ($tabOuvrages as $ouvrage) {
            //affiche les livres
            $tabAff[] = "<div> <a href=$lien>".$ouvrage["titreOuvrage"]."</a> </div>";
            $tabAff[] = "<img src='".$ouvrage["lienImageOuvrage"]."' alt='Image de l'ouvrage'/>";

        }

        $tabAff[] = "</div> </div>";

    }

           


    require_once("vue/debut.php");
    include("vue/menu.html");
    include("vue/corps.php");
    require_once("vue/vueCatégorie.php");
    include("vue/footer.html");

    }






		
	
	
	
	
	
		
		}
		
?>