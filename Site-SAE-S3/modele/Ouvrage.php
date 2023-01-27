 <?php
	
	class Ouvrage extends Modele {
		
	protected static $objet = "Ouvrage";
	protected static $cle = "numOuvrage";
	
	protected $numero;
	protected $titre;
	protected $dateParution;
	protected $nbPages;
	protected $resumeOuvrage;
	protected $numCodeBarre;
	protected $ibsn;
	protected $exemplaireRestant;
	protected $lienImageOuvrage;

	
	//Fonction qui permet d'afficher les caractéristiques d'un livre
	public function afficher(){
		//Description d'un livre avec ses caractéristiques
		echo "<p> Exemplaire n° $this->numero, son titre est $this->titre, son code barre est $this->numCodeBarre et son ibsn est $this->ibsn. Sa date de parution est $this->dateParution  et il possède $this-> nbPages. Voici un résumé de ce livre : $this-> resume </p>";
	}
	
	
	// methode static qui retourne le nombre d'exemplaires restant
	//Deux requêtes qui retournent pour l'une le nombre d'exemplaires d'un ouvrage qu'il soit emprunté ou non. Pour l'autre, elle retournera le nombre d'exemplaires empruntés. On fera la requête 1 - requête 2 et on obtiendra la nombre d'exemplaires restants.
	public static function ExemplairesRestant($i){
		
		// écriture de la requete 1 qui retourne le nombre d'exemplaires d'un ouvrage qu'il soit emprunté ou non
		$requete1= "SELECT COUNT * FROM Ouvrage WHERE $i = $numero;";
		
		//preparation de la requete par la methode prepare et stockage dans une variable
		$reqPrep = Connexion::pdo()->prepare($requetePreparee);
		
		//preparation du tableau des valeurs des différents tags utilisés (un seul ici)
		
		$valeurs = array(
			"immat_tag" =>$i
		
		);    // tag=>valeur
		
		// execution de la requete dans un bloc "try...catch"
		
		try{
			// éxecution de la requete par la methode execute
			
			$reqPrep->execute($valeurs);
			
			//traitement de la réponse
			$reqPrep ->setFetchmode(PDO::FETCH_CLASS,'Voiture');
			
			// récupération de la voiture 
			$v = $reqPrep->fetch();
			
			// on retourne $v
			return $v;
		}
		catch(PDOException $e){
			echo $e-> getMessage();
		}
	}
	
	
	
	}
    ?>