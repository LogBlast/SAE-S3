<?php
	
	class Emprunteur extends Modele {
		
	protected static $objet = "emprunteur";
	protected static $cle = "numEmprunteur";
	
	protected $numEmprunteur;
	protected $telEmprunteur;
	protected $emailEmprunteur;
	protected $nomEmprunteur;
	protected $prenomEmprunteur;
	protected $ageEmprunteur;
	protected $numAbonnement;
	
	//Fonction qui permet d'afficher les caractéristiques d'un emprunteur
	public function afficher(){
		//Description d'un(e) emprunteur(se) avec ses caractéristiques
		echo "<p> Emprunteur/se n° $this->numEmprunteur, son nom est $this->nomEmprunteur, son prénom est $this->prenomEmprunteur, son numéro de téléphone est $this->telEmprunteur. Son email est $this->emailEmprunteur, il a $this->ageEmprunteur ans et il possède un abonnement $this->numAbonnement. </p>";
	}
	}
	?>