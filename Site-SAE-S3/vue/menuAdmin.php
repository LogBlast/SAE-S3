<header>

    <h2 class="menuProfil"><?php echo 'La Bibliotheca- Bienvenue '.$_SESSION["login"].' - <a href="index.php?controleur=controleurAdministrateur&action=deconnecter">se déconnecter</a>'; ?></h2>
    <a href="routeur.php"><img src="vue/images/Icones/logo.png" class="logo"
      alt="icone du site"></a>
    <a href="vue/pageConnexion.html"><img src="vue/images/Icones/icone_profil.png" class="profil" alt="icone de profil"></a>
    <a href="https://www.iut-orsay.universite-paris-saclay.fr/"><img src="vue/images/Icones/logo_iut.png" class="iut" alt="logo de l'iut d'orsay"></a>

       
</header> 

 <nav class="style-1">
    
    <a href="#" class="btn">Ajouter Livre</a>
    <a href="index.php?controleur=controleurEmprunteur&action=lireInfosEmprunteurs" class="btn">Gerer Emprunteur</a>
    <a href="index.php?controleur=controleurAdministrateur&action=afficherFormulaireCreation" class="btn">créer Bibliothécaire</a>
    <a href="index.php?controleur=controleurEmprunteur&action=afficherFormulaireCreationEmprunteur" class="btn">créer Emprunteur</a>
  <a href="index.php?controleur=controleurAdministrateur&action=lireObjet&login=<?php echo $_SESSION["login"]; ?>" class="btn">mon profil</a>
    
  </nav>
  
  