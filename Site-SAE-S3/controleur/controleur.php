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

require_once("modele/session.php");

//définition du contrôleur générique
class Controleur {
	 
	public static function lireObjets() {
	  
    $objet = static::$objet;
	
    $classe = ucfirst($objet);
	
    $titre = "les {$objet}s";
	
    $identifiant = static::$cle;
	
    $tab_obj = $classe::getAll();
	
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
	
    foreach($tab_obj as $obj) {
		
      if ($obj->affichable()) {
		  
        $id = $obj->get($identifiant);
		
        $lienDetails = "<a class='bouton' href=\"index.php?controleur=controleur{$classe}&action=lireObjet&$identifiant=$id\"> détails </a>";
		
        $lienSupprimer = "<a class='bouton' href=\"index.php?controleur=controleur{$classe}&action=supprimerObjet&$identifiant=$id\"> supprimer </a>";
		
        $lienModifier = "<a class='bouton' href=\"index.php?controleur=controleur{$classe}&action=afficherFormulaireModification&$identifiant=$id\"> modifier </a>";
		
        if (Session::adminConnected()) {
			
          $tabAff[] = "<div class='ligne'><div>$objet $id</div><div class='lesBoutons'><div> $lienModifier</div><div> $lienSupprimer</div><div> $lienDetails</div></div></div>";
        } 
		
		else {
			
          if ($classe == "") {//JE SAIS PAS QUOI METTRE NORMALEMENT C EST VOITURE
			  
            $tabAff[] = "<div class='ligne'><div>$objet $id</div><div class='lesBoutons'><div> $lienDetails</div></div></div>";
          } 
		  
		  
		  else {
			  
            if ($id == $_SESSION["login"]) {
				
              $tabAff[] = "<div class='ligne'><div>$objet $id</div><div class='lesBoutons'><div> $lienModifier</div><div> $lienDetails</div></div></div>";
            } 
			
			else {
				
              $tabAff[] = "<div class='ligne'><div>$objet $id</div><div class='lesBoutons'><div> $lienDetails</div></div></div>";
            }
          }
        }
      }
    }
	
    include("vue/debut.php");
    include(Session::urlMenu());
    include("vue/lesObjets.php");
    include("vue/footer.html");
  }

// la méthode de récupération de l'objet
  // dont l'identifiant est passé en GET
  
  public static function lireObjet() {
	  
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "1 $objet";
    $identifiant = static::$cle;
    $id = $_GET[$identifiant];
    $obj = $classe::getObjetById($id);
	
    include("vue/debut.php");
		
    include(Session::urlMenu());
	
    if (!$obj) {
		
      $message = "$objet d'identifiant $id non présent dans la base !";
      include("vue/erreur.php");
	  
    }
	
    else
      include("vue/unObjet.php");
  
    include("vue/footer.html");
  }



public static function supprimerObjet() {
	
    if (Session::adminConnected()) {
		
      $objet = static::$objet;
      $classe = ucfirst($objet);
      $titre = "supprimer $objet";
      $identifiant = static::$cle;
      $id = $_GET[$identifiant];
      $classe::deleteObjetById($id);
      self::lireObjets();
    } 
	
	else {
		
      self::lireObjets();
    }
  }


public static function rechercher(){
     
  include("vue/debut.php");
    include("vue/menu.html");
    include("vue/corps.php");
	$lien2="routeur.php?controleur=controleurOuvrage&action=lireDetailsOuvrages";

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

    <p class='titreO'> <a href=$lien2> $ouvrage[titreOuvrage] </a> </p> </div>" ;


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