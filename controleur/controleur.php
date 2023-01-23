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

//définition du contrôleur générique
class Controleur {
	 
	// la méthode de récupération et d'affichage de tous les objets
	public static function lireObjets() {
		
		$titre = $objet;
		
		
		$tab = $cle::getAll();
		
		
		// construction du tableau de liens pour l'affichage
		$tabAff = array();
		foreach($tab as $u) {
			
		  $log = $u->get("login");
		  
		  
		  $lienDetails = "<a class='bouton' href=\"routeur.php?controleur=controleurUtilisateur&action=lireUtilisateur&login=$log\"> détails </a>";
		  $tabAff[] = "<div class='ligne'><div>utilisateur $log</div><div> $lienDetails</div></div>";
		}
		include("vues/accueil.php");
	 }
	
}
?>