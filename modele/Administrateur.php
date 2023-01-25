<?php
	
	class Administrateur extends Modele {
		
	protected static $objet = "admin";
	protected static $cle = "numAdmin";
	
	protected $numAdmin;
	protected $nomAdmin;
	protected $droitAdmin;
	protected $telAdmin;
	protected $emailAdmin;
	
	//Fonction qui permet d'afficher les caractéristiques d'un administrateur(ice)
	public function afficher(){
		//Description d'un administrateur(rice) avec ses caractéristiques
		echo "<p> Administrateur(rice) n° $this->numAdmin, son nom est $this->nomAdmin, ses droits sont $this->droitAdmin, son téléphone est $this->telAdmin et son email est $this-> emailAdmin. </p>";
	}
	}
	?>