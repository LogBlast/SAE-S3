<?php
	
	class Auteur extends Modele {
		
	protected static $objet = "auteur";
	protected static $cle = "numAuteur";
	
	protected $numAuteur;
	protected $nomAuteur;
	protected $prenomAuteur;
	protected $dateNaissanceAuteur;
	
	//Fonction qui permet d'afficher les caractéristiques d'un auteur/autrice
	public function afficher(){
		//Description d'un auteur/autrice avec ses caractéristiques
		echo "<p> Auteur/Autrice n° $this->numAuteur, son nom est $this->nomAuteur, son prénom est $this->prenomAuteur et sa date de naissance est le $this->dateNaissanceAuteur. </p>";
	}