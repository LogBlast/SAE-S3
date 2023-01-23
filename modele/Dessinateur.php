<?php
	
	class Dessinateur extends Modele {
		
	protected static $objet = "dessinateur";
	protected static $cle = "numDessinateur";
	
	protected $numDessinateur;
	protected $nomDessinateur;
	protected $prenomDessinateur;
	protected $dateNaissanceDessinateur;

	//Fonction qui permet d'afficher les caractéristiques d'un dessinateur(rice)
	public function afficher(){
		//Description d'un(e) dessinateur(rice) avec ses caractéristiques
		echo "<p> Dessinateur(rice) n° $this->numDessinateur, son nom est $this->nomDessinateur, son prénom est $this->prenomDessinateur et sa date de naissance est le $this->emailBibli. </p>";
	}