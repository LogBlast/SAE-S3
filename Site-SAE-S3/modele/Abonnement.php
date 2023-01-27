<?php
	
	class Abonnement extends Modele {
		
	protected static $objet = "abonnement";
	protected static $cle = "numAbonnement";
	
	protected $numAbonnement;
	protected $nomAbonnement;
	protected $prixAbonnement;
	protected $limiteEmpruntAbonnement;
	protected $dureeEmpruntAbonnement;

	//Fonction qui permet d'afficher les caractéristiques d'un abonnement
	public function afficher(){
		//Description d'un abonnement avec ses caractéristiques
		echo "<p> Abonnement n° $this->numeroAbonnement, son nom est $this->nomAbonnement, son prix est $this->prixAbonnement, sa limite de livres empruntables est $this->limiteEmpruntAbonnement et sa durée d'emprunt est $this-> dureeEmpruntAbonnement. </p>";
	}
	}
	?>