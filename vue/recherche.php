<?php
			

require_once("config/connexion.php");
     



Connexion::connect();

	
	$allOuvrage = Connexion::pdo()-> query('Select * from Ouvrage ORDER BY numOuvrage DESC');
	


if(isset($_GET['s']) AND !empty($_GET['s'] )){
		$recherche = htmlspecialchars($_GET['s']);

		$q = Connexion::pdo()->prepare('SELECT titreOuvrage, lienImageOuvrage FROM Ouvrage WHERE titreOuvrage LIKE :recherche ORDER BY numOuvrage DESC ');


    	$q->execute(array(':recherche' => "%$recherche%"));

    	$allOuvrage = $q->fetchAll();
	}



if(!is_array($allOuvrage) && !($allOuvrage instanceof Countable)) {
    exit();
}



$counter = 0;
echo '<div class="row">';

if(count($allOuvrage) >0 ){
	
	 foreach($allOuvrage as $ouvrage){
		 
		 $lien="$ouvrage[lienImageOuvrage]";

		 echo "<div class='col'>
		 <img src='$lien' alt='$ouvrage[titreOuvrage]'>

		 <p class='titreO'> $ouvrage[titreOuvrage] </p> </div>" ;
		

		 $counter++;
    	if($counter % 2 == 0) {
        	echo '</div><div class="row">';
    	}
	}
	
	
}else {
	
	echo "<p> Erreur, aucun livre n'est trouvé ! </p>";
	
}

	
	
?>