<?php
	
	class Editeur extends Modele {
		
	protected static $objet = "editeur";
	protected static $cle = "numEditeur";
	
	protected $numEditeur;
	protected $nomEditeur;
	protected $adresseEditeur;

	//Fonction qui permet d'afficher les caractéristiques d'un éditeur/éditrice
	public function afficher(){
		//Description d'un(e) éditeur/éditrice avec ses caractéristiques
		echo "<p> Editeur/Editrice n° $this->numEditeur, son nom est $this->nomEditeur, son adresse est $this->adresseEditeur. </p>";
	}