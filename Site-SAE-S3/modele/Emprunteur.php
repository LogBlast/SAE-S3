<?php
	
	class Emprunteur extends Modele {
		
	protected static $objet = "Emprunteur";
	protected static $cle = "numEmprunteur";
	
	protected $numEmprunteur;
	protected $telEmprunteur;
	protected $emailEmprunteur;
	protected $nomEmprunteur;
	protected $prenomEmprunteur;
	protected $ageEmprunteur;
	protected $numAbonnement;
	protected $isAdmin;
	protected $isBiblio;
	protected $login;
	protected $mdp;




	public function isAdmin() {return $this->isAdmin == 1;}


	
	//Fonction qui permet d'afficher les caractéristiques d'un emprunteur
	public function afficher(){
		//Description d'un(e) emprunteur(se) avec ses caractéristiques
		echo "<p> Emprunteur/se n° $this->numEmprunteur, son nom est $this->nomEmprunteur, son prénom est $this->prenomEmprunteur, son numéro de téléphone est $this->telEmprunteur. Son email est $this->emailEmprunteur, il a $this->ageEmprunteur ans et il possède un abonnement $this->numAbonnement. </p>";
	}
	


	public function affichable() {return !$this->isAdmin;}
	



	
	public static function checkMDP($login,$mdp) {
		$requetePreparee = "SELECT * FROM Emprunteur WHERE login = :login_tag and mdp = :mdp_tag;";//nom de la table
		$req_prep = connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
		
			"login_tag" => $login,
			"mdp_tag" => $mdp
		);
		
		$req_prep->execute($valeurs);
		$req_prep->setFetchMode(PDO::FETCH_CLASS,"Emprunteur");//nom de la classe
		
		$tabEmprunteurs = $req_prep->fetchAll();
		if (sizeof($tabEmprunteurs) == 1)
			return true;
		else
			return false;
	}



	public static function getAdmin($login) {
		
		$requetePreparee = "SELECT isAdmin FROM Emprunteur WHERE login = :login_tag;";//nom de la table
		$req_prep = connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
			"login_tag" => $login
		);
		
		$req_prep->execute($valeurs);
		$req_prep->setFetchMode(PDO::FETCH_CLASS,"Emprunteur");//nom de la classe
		
		$tabEmprunteurs = $req_prep->fetchAll();
		$isAdmin = $tabEmprunteurs[0]->isAdmin;
		
		if(empty($tabEmprunteurs)){
   			 return false;
		}

		return $isAdmin;
	}



    public static function getBiblio($login){
        $requetePreparee = "SELECT isBiblio FROM Emprunteur WHERE login = :login_tag;";
        $req_prep = connexion::pdo()->prepare($requetePreparee);
        $valeurs=array("login_tag"=>$login);
        $req_prep->execute($valeurs);
        $req_prep->setFetchMode(PDO::FETCH_CLASS,"Emprunteur");
        $tabEmprunteurs = $req_prep->fetchAll();
        $isBiblio = $tabEmprunteurs[0]->isBiblio;
        
        if (empty($tabEmprunteurs)){
            return false;
        }
        return $isBiblio;
    }
	
	
	
	
	public static function updateEmprunteur($numE,$telE,$emailE,$nomE,$prenomE,$ageE,$numAboE,$isAdminE,$isBiblioE,$loginE,$mdpE){
        
        $requetePreparee= 
		
		"UPDATE Emprunteur SET telE = :telE_tag, emailE = :emailE_tag, nomE = :nomE_tag, prenomE = :prenomE_tag, ageE = :ageE_tag, numAboE = :numAboE_tag, isAdminE = :isAdminE_tag, isBiblioE = :isBiblioE_tag, loginE = :loginE_tag, mdpE = :mdpE_tag WHERE numE = :numE_tag;";
		
        
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
		
        $valeurs = array(
		
				"numE_tag" => $numE,
				"telE_tag" => $telE,
	            "emailE_tag" => $emailE,
	            "nomE_tag" =>$nomE,
	            "prenomE_tag" => $prenomE,
	            "ageE_tag" => $ageE,
	            "numAboE_tag" => $numAboE,
	            "isAdminE_tag" => $isAdminE,
	            "isBiblioE_tag" => $isBiblioE,
	            "loginE_tag" =>$loginE,
	            "mdpE_tag" => $mdpE
				
            );
			
            try {
				
                $req_pre->execute($valeurs);
                return true;
            } 
			
			catch(PDOException $e){
                return false;
            }
			
	}



public static function addEmprunteur($numE,$telE,$emailE,$nomE,$prenomE,$ageE,$numAboE,$isAdminE,$isBiblioE,$loginE,$mdpE){


/*
    $requetePreparee = "INSERT INTO Emprunteur (numEmprunteur, telEmprunteur, emailEmprunteur, nomEmprunteur, prenomEmprunteur, ageEmprunteur, numAbonnement, isAdmin, isBiblio, login, mdp) VALUES (:numE_tag, :telE_tag, :emailE_tag, :nomE_tag, :prenomE_tag, :ageE_tag, :numAboE_tag, :isAdminE_tag, :isBiblioE_tag, :loginE_tag, :mdpE_tag)";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array(
        "numE_tag" => $numE,
        "telE_tag" => $telE,
        "emailE_tag" => $emailE,
        "nomE_tag" =>$nomE,
        "prenomE_tag" => $prenomE,
        "ageE_tag" => $ageE,
        "numAboE_tag" => $numAboE,
        "isAdminE_tag" => $isAdminE,
        "isBiblioE_tag" => $isBiblioE,
        "loginE_tag" =>$loginE,
        "mdpE_tag" => $mdpE
    );


    */



    $query = "INSERT INTO Emprunteur (numEmprunteur, telEmprunteur, emailEmprunteur, nomEmprunteur, prenomEmprunteur, ageEmprunteur, numAbonnement, isAdmin, isBiblio, login, mdp) 
              VALUES (:numE, :telE, :emailE, :nomE, :prenomE, :ageE, :numAboE, :isAdminE, :isBiblioE, :loginE, :mdpE)";
    $stmt = Connexion::pdo()->prepare($query);

    $stmt->bindValue(':numE', $numE);
    $stmt->bindValue(':telE', $telE);
    $stmt->bindValue(':emailE', $emailE);
    $stmt->bindValue(':nomE', $nomE);
    $stmt->bindValue(':prenomE', $prenomE);
    $stmt->bindValue(':ageE', $ageE);
    $stmt->bindValue(':numAboE', $numAboE);
    $stmt->bindValue(':isAdminE', $isAdminE);
    $stmt->bindValue(':isBiblioE', $isBiblioE);
    $stmt->bindValue(':loginE', $loginE);
    $stmt->bindValue(':mdpE', $mdpE);
    
    try{
    $stmt->execute();
    return true;
    
    } catch(PDOException $e){
        return false;
    }
}
	
	
	
	
	
	
	
	}
	?>