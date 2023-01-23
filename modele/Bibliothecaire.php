<?php
	
	class Bibliothecaire extends Modele {
		
	protected static $objet = "bibli";
	protected static $cle = "numBibli";
	
	protected $numBibli;
	protected $nomBibli;
	protected $prenomBibli;
	protected $telBibli;
	protected $emailBibli;

	//Fonction qui permet d'afficher les caractéristiques d'un bibliothécaire
	public function afficher(){
		//Description d'un(e) bibliothécaire avec ses caractéristiques
		echo "<p> Bibliothecaire n° $this->numBibli, son nom est $this->nomBibli, son prénom est $this->prenomBibli, son numéro de téléphone est $this->telBibli et son email est $this->emailBibli. </p>";
	}