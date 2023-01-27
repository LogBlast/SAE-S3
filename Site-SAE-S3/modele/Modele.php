<?php
class Modele {
	
	
	
	public function affichable() {return true;}
	
	
	//getter générique qui va remplacer les getter des classes filles
	public function get( $attribut ) {
		return $this-> $attribut;
	}
	
	//setter générique qui va remplacer les getter des classes filles
	public function set( $attribut, $valeur ) {
		$this-> $attribut = $valeur;
	}
	
	//constructeur générique
	public function _construct( $donnees = NULL ) {
		if( !is_null( $donnees )) {
			foreach( $donnees as $attribut => $valeur) {
				$this->set( $attribut, $valeur );
			}
		}
	}
	
	// méthode static qui retourne la voiture d'immatriculation $i
	public static function getAll() {
		//récupération de la variable static de la classe fille
		$table = static::$objet; //récupère "utilisateur" ou "voiture" selon les cas
		// écriture de la requête
		$requete = "SELECT * FROM $table";
		// envoi de la requête et stockage de la réponse
		$resultat = connexion::pdo()->query($requete);
		// traitement de la réponse
		$resultat->setFetchmode(PDO::FETCH_CLASS,ucfirst($table));
		$tableau = $resultat->fetchAll();
		return $tableau;
	}
	
	// méthode static générique qui retourne l'objet (voiture ou utilisateur) d'identifiant $id
	public static function getByNum($id) {    //num etant le $id
		//récupération de la variable static $objet de la classe fille
		$table = static::$objet; //récupère "utilisateur" ou "voiture" selon les cas
		//récupération de la variable static $objet de la classe fille
		$identifiant = static::$cle; //récupère "utilisateur" ou "voiture" selon les cas
		// écriture de la requête
		$requetePreparee = "SELECT * FROM $table WHERE $identifiant = :id_tag;";
		// préparation de la requête
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		// le tableau des valeurs
		$valeurs = array("id_tag" => $id);
		try {
			// envoi de la requête
			$req_prep->execute($valeurs);
			// traitement de la réponse
			$req_prep->setFetchmode(PDO::FETCH_CLASS,ucfirst($table));
			// récupération de la voiture
			$obj = $req_prep->fetch();
			// retour
			return $obj;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}

	}
	
	// méthode static qui retourne l'objet d'identifiant $id
	public static function getObjetById($id) {
		$table = static::$objet;
		$identifiant = static::$cle;
		$classe = ucfirst($table);
		// écriture de la requête
		$requetePreparee = "SELECT * FROM $table WHERE $identifiant = :id_tag;";
		// préparation de la requête
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		// le tableau des valeurs
		$valeurs = array("id_tag" => $id);
		try {
			// envoi de la requête
			$req_prep->execute($valeurs);
			// traitement de la réponse
	    $req_prep->setFetchmode(PDO::FETCH_CLASS,$classe);
			// récupération de l'objet
			$u = $req_prep->fetch();
			// retour
			return $u;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	// méthode de suppression
	public static function deleteObjetById($id) {
		$table = static::$objet;
		$identifiant = static::$cle;
		$classe = ucfirst($table);
		// écriture de la requête
		$requetePreparee = "DELETE FROM $table WHERE $identifiant = :id_tag;";
		// préparation de la requête
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		// le tableau des valeurs
		$valeurs = array(
			"id_tag" => $id,
		);
		try {
			// envoi de la requête
			$req_prep->execute($valeurs);
			return true;
			// traitement de la réponse
		} catch(PDOException $e) {
			// echo "<p>".$e->getMessage()."</p>";
			return false;
		}
	}
}