<?php
	
	class TypeOuvrage extends Modele {
		
	protected static $objet = "typeOuvrage";
	protected static $cle = "numTypeOuvrage";
	
	protected $numTypeOuvrage;
	protected $nomTypeOuvrage;

	//Fonction qui permet d'afficher les caractéristiques d'un type d'ouvrages
	public function afficher(){
		//Description d'un type d'ouvrages avec ses caractéristiques
		echo "<p> > Type d'ouvrages n° $this->numTypeOuvrage, son nom est $this->nomTypeOuvrage. </p>";
	}