<?php


require_once("modele/Modele.php");

// insertion du modèle Emprunteur
require_once("modele/Emprunteur.php");





// définition du contrôleur Emprunteur
class ControleurEmprunteur {
	
	protected static $objet = "Emprunteur";
	protected static $cle = "numEmprunteur";

  
public static function afficherFormulaireConnexion() {
	  
    $titre = "formulaire de connexion";
	
   
    header("vue/pageConnexion.html");
   
	
  }
		
		
// 1 

 public static function connecter() {


        $titre = "connexion ";
		$l = $_GET["login"];
		$m = $_GET["mdp"];

		if (Emprunteur::checkMDP($l,$m)) {
			$_SESSION["login"] = $l;
			
			$obj = Emprunteur::getObjetById($l);


			if(Emprunteur::getAdmin($l) ==1 ) {

				$_SESSION["isAdmin"] = 1;
			}


		
			require_once("vue/debut.php");


			if(Emprunteur::getAdmin($l) == 1){
				require_once("vue/menuAdmin.php");
			} else if (Emprunteur::getBiblio($l) ==1){
                require_once("vue/menuBibliothécaire.php");
            } else {
                require_once("vue/menuEmprunteur.php");
            }

    		require_once("vue/corps.php");
    		require_once("vue/footer.html");       
		


		} else {
			self::afficherFormulaireConnexion();
		}
	}


//2 FONCTION POUR CREE DES MAUDIS EMPRUNTEURS 

 public static function creerEmprunteur(){
	 
		if (Session::adminConnected() ) {//verifie si tes un admin
			
        $titre = "creation emprunteur";
		
        $numE = $_GET["numEmprunteur"];
        $telE = $_GET["telEmprunteur"];
        $emailE = "'".$_GET["emailEmprunteur"]."'";
        $nomE = "'".$_GET["nomEmprunteur"]."'";
        $prenomE = "'".$_GET["prenomEmprunteur"]."'";
        $ageE = $_GET["ageEmprunteur"];
        $numAboE = $_GET["numAbonnement"];
        $isAdminE = $_GET["isAdmin"];
        $isBiblioE = $_GET["isBiblio"];
        $loginE = "'".$_GET["login"]."'";
        $mdpE = "'".$_GET["mdp"]."'";
		
		//APPEL DE LA FONCTION ADDEMPRUNTEUR DANS LA CLASSE EMPRUNTEUR QUI FAIT UNE REQUETE MYSQL
		
        $b = Emprunteur::addEmprunteur($numE,$telE,$emailE,$nomE,$prenomE,$ageE,$numAboE,$isAdminE,$isBiblioE,$loginE,$mdpE);
		
		if($b){
			
			self::lireInfosEmprunteurs();
		}
		
		else {
			
			//afficherFormulaireCreeEmprunteur
			
			self::afficherFormulaireCreationEmprunteur();
		}
		
		}
		else{
			self::lireInfosEmprunteurs();
		}  

}

	
	
	
	
	
	
	
	//FONCTION POUR AFFICHER LE FORMULAIRE DES MAUDIS EMPRUNTEURS
	
	public static function afficherFormulaireCreationEmprunteur() {
	  
	  include("vue/debut.php");
	  
	  
   // if (Session::adminConnected()) {
		
      $titre = "formulaire création emprunteur";
      
	  //include("vue/menuAdmin.php");
      include(Session::urlMenu());
      include("vue/emprunteur/formulaireCreation.html");
     
	  //}
	
	//else {
		
		
     //self::lireInfosEmprunteurs();
	 
    //}
	
	 include("vue/footer.html");
	 
  }
  
  
  
  public static function afficherFormulaireModificationEmprunteur() {
	  
    if (Session::adminConnected() || $_GET["login"] == $_SESSION["login"]) {
		
      $titre = "formulaire modification emprunteur";
	  
      $loginE = $_GET["login"];
      $e = Emprunteur::getObjetById($loginE);
	  
	  $numE = $e->get('numEmprunteur');
	  $telE = $e->get('telEmprunteur');
	  $emailE = $e->get('emailEmprunteur');
	  $nomE = $e->get('nomEmprunteur');
      $prenomE = $e->get('prenomEmprunteur');
	  $ageE = $e->get('ageEmprunteur');
      $numAboE = $e->get('numAbonnement');
      $mdpE = $e->get('mdp');
      
 
	  
      include("vue/debut.php");
      include(Session::urlMenu());
      include("vue/emprunteur/formulaireModification.html");
      include("vue/fin.html");
    } 
	
	else {
		
      self::lireInfosEmprunteurs();
    }

  }
  
  
  


    public static function modifierEmprunteur(){
		
		if (Session::adminConnected() || $_GET["login"] == $_SESSION["login"]) {
			
            $titre = "modifer emprunteur";
			
            $numE = $_GET["numEmprunteur"];
            $telE = $_GET["telEmprunteur"];
            $emailE = $_GET["emailEmprunteur"];
            $nomE = $_GET["nomEmprunteur"];
            $prenomE = $_GET["prenomEmprunteur"];
            $ageE = $_GET["ageEmprunteur"];
            $numAboE = $_GET["numAbonnement"];
            $isAdminE = $_GET["isAdmin"];
            $isBiblioE = $_GET["isBiblio"];
            $loginE = $_GET["login"];
            $mdpE = $_GET["mdp"];
			
            $b = Ouvrage::updateEmprunteur($numE,$telE,$emailE,$nomE,$prenomE,$ageE,$numAboE,$isAdminE,$isBiblioE,$loginE,$mdpE);
			
            self::lireInfosEmprunteurs();
			
		}
		
		else {
			self::lireInfosEmprunteurs();
			}
		
        }
		
		
	
		
		
		public static function lireInfosEmprunteurs() {
			
			$objet = static::$objet;
			$classe = ucfirst($objet);
			$titre = "les {$objet}s";
			$identifiant = static::$cle;
			$tab_obj = $classe::getAll();
			
			// construction du tableau de liens pour l'affichage
			$tabAff = array();
			
			foreach($tab_obj as $obj) {
				$id = $obj->get($identifiant);
			  
			  $numE = $obj->get("numEmprunteur");
			  $telE = $obj->get("telEmprunteur");
			  $emailE = $obj->get("emailEmprunteur");
			  $nomE = $obj->get("nomEmprunteur");
			  $prenomE = $obj->get("prenomEmprunteur");
			  $ageE = $obj->get("ageEmprunteur");
			  $numAboE = $obj->get("numAbonnement");
			  $isAdminE = $obj->get("isAdmin");
			  $isBiblioE = $obj->get("isBiblio");
			  $loginE = $obj->get("login");
			  $mdp = $obj->get("mdp");


			  $tabAff[] = "<div class='ligne'><div>$objet : $id, numero : $numE, telephone : $telE, email : $emailE, nom : $nomE, prenom : $prenomE, age : $ageE, numero de l'abonnement : $numAboE, login : $loginE ";//rajouter des balises div pour la mise en forme
			
			}
			
			include("vue/debut.php");
			include(Session::urlMenu());
			include("vue/corps.php");
			include("vue/vueadmin.php");  //ca va surement change de nom
			include("vue/footer.html");
  
  }
		
		
		
		
		
}
?>