<?php


//require_once("modele/Modele.php");

// insertion du modèle Ouvrage
//require_once("modele/Ouvrage.php");

// définition du contrôleur Ouvrage
class ControleurOuvrage extends Controleur{
	
	protected static $objet = "ouvrage";
	protected static $cle = "numOuvrage";

  // la méthode de récupération de l'utilisateur
  // dont le login est passé en GET
  
  public static function lireUnOuvrage() {
    $titre = "un ouvrage";
    $l = $_GET["numOuvrage"];
    $obj = Ouvrage::getByNum($l);;
    include("vue/debut.php");
    include("vue/menu.html");
    if (!$obj){
		$messageErreur ="Oups une erreur s'est produite :(";
		$messageErreur .="l'ouvrage de login $l n'existe pas dans la base !";
		
      include("vue/erreur.php");
    }
	else
      include("vue/unObjet.php");
    include("vue/fin.html");
  }


	public static function lireAccueil() {
	$i=0;
	$x=0;
	$a=0;
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "les {$objet}s";
    $identifiant = static::$cle;
	//static $image = "lienImageOuvrage";
	//$lienImage=static::$image;
    $tab_obj = $classe::getAll();
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    $tabAcc = array();
    foreach($tab_obj as $obj) {
      
	  
	  
	  if($x==$i){
	  $id = $obj->get($identifiant);
	  $im = $obj->get("lienImageOuvrage");
	  }
        
      if($a==$i){
          $id = $obj->get($identifiant);
          $im = $obj->get("lienImageOuvrage");
          
          
      }
	  
	  if (($x+1)==$i){
	  
		$id2 = $obj->get($identifiant);
		$im2 = $obj->get("lienImageOuvrage");
	  }
	  
	  
	  //$id3 = $o->get($identifiant);
	  //$im3 = $o->get("lienImageOuvrage");

		
	  if(($x+2)==$i){
		$id3 = $obj->get($identifiant);
	    $im3 = $obj->get("lienImageOuvrage");
		$tabAff[] = "<div class='ligne'><div> $id <img src=$im> $id2 <img src=$im2> $id3 <img src=$im3> ";//rajouter des balises div pour la mise en forme    
		if($a<2){
		    $tabAcc[]="<div class:'ligne'><div> $id <img src=$im> $id <img src=$im2> $id3 <img src=$im3>";
		}
		$x=$i;
		$i=$i-1;
		$a=$a+1;
	  }
	  $i=$i+1;
    }
	include("vue/debut.php");
    include("vue/menu.html");
	include("vue/corps.php");
	
    include("vue/vueAcueille.php");  //ca va surement change de nom
    
    include("vue/footer.html");
  }

	 
	 
	 
	 
	 
	 public static function lireInfosOuvrages() {
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "les {$objet}s";
    $identifiant = static::$cle;
    $tab_obj = $classe::getAll();
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    foreach($tab_obj as $obj) {
      $id = $obj->get($identifiant);
      $t = $obj->get("titreOuvrage");
      $d = $obj->get("dateParutionOuvrage");


    $tabAff[] = "<div class='ligne'><div>$objet $id, $t, paru le $d";//rajouter des balises div pour la mise en forme
    }
	include("vue/debut.php");
    include("vue/menu.html");
	include("vue/corps.html");
    include("vue/vueadmin.php");  //ca va surement change de nom
    include("vue/footer.html");
  
  }

	public static function LireLesTitres() {
		$x=0;
		$i=0;
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "les {$objet}s";
    $identifiant = static::$cle;
	//$image = "lienImageOuvrage";
	//$lienImage=static::$image;
    $tab_obj = $classe::getAll();
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    foreach($tab_obj as $obj) {
      
	  
	  
	  if($x==$i){
	  $t = $obj->get("titreOuvrage");
	  $im = $obj->get("lienImageOuvrage");
	  }

	  
	  if (($x+1)==$i){
	  
		$t2 = $obj->get("titreOuvrage");
		$im2 = $obj->get("lienImageOuvrage");
		$tabAff[] = "<div class='ligne'><div> $t <img src=$im> $t2 <img src=$im2> ";//rajouter des balises div pour la mise en forme
		$x=$i;
		$i=$i-1;
	  }
	  	  $i=$i+1;
    }
	  
	  //$id3 = $o->get($identifiant);
	  //$im3 = $o->get("lienImageOuvrage");

	include("vue/debut.php");
    include("vue/menu.html");
	include("vue/corps.html");
    include("vue/vueBiblio.php");  //ca va surement change de nom
    include("vue/footer.html");
  }
    
    
    public static function lireLesOuvrages() {
        $i=0;
        $x=0;
        $a=0;
        $objet= static::$objet;
        $classe = ucfirst($objet);
        $titre = "les {$objet}s";
        $identifiant = static::$cle;
        //static  = "lienImageOuvrage";
        //=static::;
        $tab_obj = $classe::getAll();
        // construction du tableau de liens pour l'affichage
        $tabAff = array();
        $tabAcc = array();
        foreach($tab_obj as $obj) {
          
          
          
          if($x==$i){
          $id = $obj->get($identifiant);
          $im = $obj->get("lienImageOuvrage");
          }
    
              
          
          
          if (($x+1)==$i){
          
            $id2 = $obj->get($identifiant);
            $im2 = $obj->get("lienImageOuvrage");
          }
          
          
          // = ->get();
          // = ->get("lienImageOuvrage");
    
            
          if(($x+2)==$i){
            $id3 = $obj->get($identifiant);
            $im3 = $obj->get("lienImageOuvrage");
            $tabAff[] = "<div class='ligne'><div>  <img src=>  <img src=>  <img src=> ";//rajouter des balises div pour la mise en forme    
            if($a<2){
                $tabAcc[]="<div class:'ligne'><div>  <img src=>  <img src=>  <img src=>";
            }
            $x=$i;
            $i=$i-1;
            $a=$a+1;
          }
          $i=$i+1;
        }
        include("vue/debut.php");
        include("vue/menu.html");
        include("vue/corps.php");
        
        include("vue/listeOuvrage.php");  //ca va surement change de nom
        
        include("vue/footer.html");
      }
    	 public static function lireDetailsOuvrages() {
    $objet = static::$objet;
    $classe = ucfirst($objet);
    $titre = "les {$objet}s";
    $identifiant = static::$cle;
    $tab_obj = $classe::getAll();
    // construction du tableau de liens pour l'affichage
    $tabAff = array();
    foreach($tab_obj as $obj) {
      $t = $obj->get("titreOuvrage");
      $d = $obj->get("dateParutionOuvrage");
	  $r = $obj->get("resume");
	  $im = $obj->get("lienImageOuvrage");


    $tabAff[] = "<div class='ligne'><div> $t, paru le $d, le résumé est $r, $im";//rajouter des balises div pour la mise en forme
    }
    
}
}
?>