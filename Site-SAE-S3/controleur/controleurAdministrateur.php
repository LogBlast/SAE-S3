<?php


require_once("modele/Modele.php");

// insertion du modèle Administrateur
require_once("modele/Administrateur.php");





// définition du contrôleur Administrateur
class ControleurAdministrateur extends Controleur{
	
	protected static $objet = "Administrateur";
	protected static $cle = "numAdmin";

  // la méthode de récupération de l'emprunteur
  // dont le num est passé en GET
  
    public static function afficherFormulaireCreation() {
		
    if (Session::adminConnected()) {
		
      $titre = "formulaire création emprunteur";
	  
      include("vue/debut.php");
      include(Session::urlMenu());
      include("vue/utilisateur/formulaireCreation.html");
      include("vue/fin.html");
    } 
	
	else {
		
      self::lireObjets();
	  
    }
  }

  public static function creerEmprunteur() {
	  
    if (Session::adminConnected()) {
		
      $titre = "création emprunteur"
	  ;
      $num = $_GET["numEmprunteur"];
      $tel = $_GET["telEmprunteur"];
      $email = $_GET["emailEmprunteur"];
      $nom = $_GET["nomEmprunteur"];
      $prenom = $_GET["prenomEmprunteur"];
	  $age = $_GET["ageEmprunteur"];
	  $numAbo = $_GET["numAbonnement"];
	  
      $b = Emprunteur::addEmprunteur($num,$tel,$email,$nom,$prenom,$age,$numAbo);
	  
      if ($b)
        self::lireObjets();
	
      else {
		  
        self::afficherFormulaireCreation();
      }
	  
    } 
	
	else {
      self::lireObjets();
    }
  }

  public static function afficherFormulaireModification() {
	  
    if (Session::adminConnected() || $_GET["emailAdmin"] == $_SESSION["emailAdmin"]) {
		
      $titre = "formulaire modification emprunteur";
      $num = $_GET["numEmprunteur"];
	  
      $e = Emprunteur::getObjetById($num);
	  
      $tel = $e->get('telEmprunteur');
      $email = $e->get('emailEmprunteur');
      $nom = $e->get('nomEmprunteur');
      $prenom = $e->get('prenomEmprunteur');
	  $age = $e->get('ageEmprunteur');
	  $numAbo = $e->get('numAbonnement');
	  
	
      include("vue/debut.php");
      include(Session::urlMenu());
      include("vue/emprunteur/formulaireModification.html");
      include("vue/fin.html")
	  ;
    } 
	
	else {
		
      self::lireObjet();
    }

  }

  public static function modifierEmprunteur() {
	  
    if (Session::adminConnected() || $_GET["emailAdmin"] == $_SESSION["emailAdmin"]) {
		
      $titre = "modification emprunteur";
      $num = $_GET["numEmprunteur"];
      $tel = $_GET["telEmprunteur"];
      $email = $_GET["emailEmprunteur"];
      $nom = $_GET["nomEmprunteur"];
      $prenom = $_GET["prenomEmprunteur"];
	  $age = $_GET["ageEmprunteur"];
	  $numAbo = $_GET["numAbonnement"];
	  
      $b = Emprunteur::updateEmprunteur($num,$tel,$email,$nom,$prenom,$age,$numAbo);
	  
      self::lireObjets();
	  
    } 
	
	else {
      self::lireObjets();
    }
  }

  public static function afficherFormulaireConnexion() {
	  
    $titre = "formulaire de connexion";
	
include("vue/pageConnexion.html");
  }

//met du css stp



  public static function connecterAdmin() {
	  


	  
		$titre = "connexion";
		
		$login = $_GET["login"];
		$isAdmin = $_GET["isAdmin"] =1;
		$mdp = $_GET["mdp"];
		
		if (Administrateur::checkMDP($login,$mdp)) {
			
			$_SESSION["login"] = $login;
			
			$obj = Administrateur::getObjetById($login);
			
			$_SESSION["isAdmin"] = $isAdmin;
			
			header("vue/administrateur.html");
			
		} 


		$titre = "connexion ";
		$l = $_GET["login"];
		$m = $_GET["mdp"];

		if (Emprunteur::checkMDP($l,$m)) {
			$_SESSION["login"] = $l;
			$obj = Emprunteur::getObjetById($l);
			if($obj->isAdmin()){
				$_SESSION["isAdmin"] = $obj->isAdmin();
				header("vue/administrateur.html");
			}


		require_once("vue/debut.php");
    require_once("vue/pageConnexion.html");
    require_once("vue/footer.html");       // à changer
		


		} else {
			self::afficherFormulaireConnexion();
		}
	}

		

 public static function afficherAccueil() {
	  
	
      include("vue/debut.php");
      include(Session::urlMenu());
      include("vue/corps.php");
      include("vue/footer.html");
	  
	

  }









  public static function deconnecter() {
	  
		session_unset();
		session_destroy();
		setcookie(session_name(),'',time()-1);
		self::afficherAccueil();
	}
  




    public static function AdministrateurInfosOuvrages() {
    
	$tabAff= ControleurOuvrage::lireInfosOuvrages();
	
	
	
  }

}
?>