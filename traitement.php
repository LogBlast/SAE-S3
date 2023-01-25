<?php

require_once("controleur/controleur.php");
// sert pour lancer la fonction recherche quand on cherche un livre


if(isset($_GET['s'])) {
    Controleur::rechercher();
}



?>