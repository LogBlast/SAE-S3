<?php
	
	class Langue extends Modele {
		
	protected static $objet = "langue";
	protected static $cle = "numLangue";
	
	protected $numLangue;
	protected $nomLangue;

	//Fonction qui permet d'afficher les caractéristiques d'une langue
	public function afficher(){
		//Description d'une langue avec ses caractéristiques
		echo "<p> Langue n° $this->numLangue, son nom est $this->nomLangue. </p>";
	}