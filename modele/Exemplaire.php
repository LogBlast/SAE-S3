<?php
	
	class Exemplaire extends Modele {
		
	protected static $objet = "exemlaire";
	protected static $cle = "numExemplaire";
	
	protected $numExemplaire;
	protected $empruntableExemplaire;
	protected $etatExemplaire;
	protected $numOuvrage;
	protected $numLangue;

	//Fonction qui permet d'afficher les caractéristiques d'un exemplaire
	public function afficher(){
		//Description d'un exemplaire avec ses caractéristiques
		echo "<p> L'exemplaire n° $this->numExemplaire est $this->empruntableExemplaire. Il a un état $this->etatExemplaire. Son numéro d'ouvrage est $this->numOuvrage et son numéro de langue est $this->numLangue. </p>";
	}