<?php
	
	class Administrateur extends Modele {
		
	protected static $objet = "Administrateur";
	protected static $cle = "numAdmin";
	
	protected $numAdmin;
	protected $nomAdmin;
	protected $droitAdmin;
	protected $telAdmin;
	protected $emailAdmin;
	protected $isAdmin;
	
	public function isAdmin() {return $this->isAdmin == 1;}

	public function affichable() {return !$this->isAdmin;}
	
	
	//FONCTION POUR AJOUTER UN EMPRUNTEUR 
	
	
	public static function addEmprunteur($num,$tel,$email,$nom,$prenom,$age,$numAbo) {
		
		// écriture de la requête
		
		$requetePreparee = "INSERT INTO Emprunteur VALUES(:num_tag,:tel_tag,:email_tag,:nom_tag,:prenom_tag,:age_tag,:numAbo_tag,0);";
									//nom de la table
		
		// préparation de la requête
		
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		
		
		// le tableau des valeurs
		$valeurs = array(
		
		
			"num_tag" => $num,
			"tel_tag" => $tel,
			"email_tag" => $email,
			"nom_tag" => $nom,
			"prenom_tag" => $prenom,
			"age_tag" => $age,
			"numAbo_tag" => $numAbo,
				
		);
		
		try {
			
			// envoi de la requête
			
			$req_prep->execute($valeurs);
			
			return true;
			
			// traitement de la réponse
		} 
		
		catch(PDOException $e) {
			
			// echo "<p>".$e->getMessage()."</p>";
			return false;
		}
	}
	
	
	//Fonction qui permet d'afficher les caractéristiques d'un administrateur(ice)
	public function afficher(){
		//Description d'un administrateur(rice) avec ses caractéristiques
		echo "<p> Administrateur(rice) n° $this->numAdmin, son nom est $this->nomAdmin, ses droits sont $this->droitAdmin, son téléphone est $this->telAdmin et son email est $this-> emailAdmin. </p>";
	}
	
	// méthode de modification
	public static function updateEmprunteur($num,$tel,$email,$nom,$prenom,$age,$numAbo) {
		
		// écriture de la requête
		$requetePreparee = "UPDATE Emprunteur SET emailEmmprunteur = :email_tag, nom = :nom_tag, prenom = :prenom_tag, age = :age_tag , numAbo = : numAbo_tag WHERE num = :num_tag;";//nom de la table
		
		// préparation de la requête
		
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		
		// le tableau des valeurs
		
		$valeurs = array(
		
			"num_tag" => $num,
			"tel_tag" => $tel,
			"email_tag" => $email,
			"nom_tag" => $nom,
			"prenom_tag" => $prenom,
			"age_tag" => $age,
			"numAbo_tag" => $numAbo,
		);
		try {
			
			// envoi de la requête
			
			$req_prep->execute($valeurs);
			return true;
			
			// traitement de la réponse
			
		} 
		
		catch(PDOException $e) {
			
			// echo "<p>".$e->getMessage()."</p>";
			return false;
		}
	}

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
	
	
	
	
	
	
	
	
	}
	
	?>