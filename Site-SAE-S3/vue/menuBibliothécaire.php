<header>

    <h2 class="menuProfil"><?php echo 'La Bibliotheca - Bienvenue '.$_SESSION["login"].' - <a href="index.php?controleur=controleurUtilisateur&action=deconnecterUtilisateur">se déconnecter</a>'; ?></h2>
    <a href="vue/routeur.php"><img src="vue/images/Icones/logo.png" class="logo"
      alt="icone du site"></a>
    <a href="vue/pageConnexion.html"><img src="vue/images/Icones/icone_profil.png" class="profil" alt="icone de profil"></a>
    <a href="https://www.iut-orsay.universite-paris-saclay.fr/"><img src="vue/images/Icones/logo_iut.png" class="iut" alt="logo de l'iut d'orsay"></a>
</header> 

 <nav class="style-1">
    <a href="vue/toutOuvrages.html" class="btn">Tous les ouvrages</a>
    <a href="#" class="btn">Gérer Emprunteur</a>
    <a href="index.php?controleur=controleurAdministrateur&action=lireObjet&login=<?php echo $_SESSION["login"]; ?>" class="btn">mon profil</a>
    
  </nav>