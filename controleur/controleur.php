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
require_once("config/connexion.php");



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
  

	public static function rechercher(){
     
	include("vue/debut.php");
    include("vue/menu.html");
    include("vue/corps.php");


	Connexion::connect();

  
  	$allOuvrage = Connexion::pdo()-> query('Select * from Ouvrage ORDER BY numOuvrage DESC');
  


	if(isset($_GET['s']) AND !empty($_GET['s'] )){
    	$recherche = htmlspecialchars($_GET['s']);

    	$q = Connexion::pdo()->prepare('SELECT titreOuvrage, lienImageOuvrage FROM Ouvrage WHERE titreOuvrage LIKE :recherche ORDER BY numOuvrage DESC ');


      	$q->execute(array(':recherche' => "%$recherche%"));

      	$allOuvrage = $q->fetchAll();
  	}



	if(!is_array($allOuvrage) && !($allOuvrage instanceof Countable)) {
    	exit();
	}



	$counter = 0;
	echo '<div class="row">';

	if(count($allOuvrage) >0 ){

	   foreach($allOuvrage as $ouvrage){

		$lien="$ouvrage[lienImageOuvrage]";

		echo "<div class='col'>
		<img src='$lien' alt='$ouvrage[titreOuvrage]'>

		<p class='titreO'> $ouvrage[titreOuvrage] </p> </div>" ;


		 $counter++;
		 if($counter % 2 == 0) {
			  echo '</div><div class="row">';
      	 }
  	} 
}
	else {
  
  		echo "<p> Erreur, aucun livre n'est trouvĂ© ! </p>";
  
	}


	include("vue/footer.html");

}


}


?>