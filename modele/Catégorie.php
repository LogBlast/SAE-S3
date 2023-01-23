<?php
	
	class Catégorie extends Modele {
		
	protected static $objet = "catégorie";
	protected static $cle = "numCatégorie";
	
	protected $numCatégorie;
	protected $nomCatégorie;
	
	//Fonction qui permet d'afficher les caractéristiques d'une catégorie
	public function afficher(){
		//Description d'un(e) catégorie avec ses caractéristiques
		echo "<p> Catégorie n° $this->numCatégorie, son nom est $this->nomCatégorie. </p>";
	}