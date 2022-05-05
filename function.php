<?php
    $bdd = new PDO("mysql:host=localhost;dbname=eval01;charset=utf8", "root", "");

    if(isset($_POST['forminscription'])) {
        $pseudo = htmlspecialchars($_POST['pseudo_user']);
        $mail = htmlspecialchars($_POST['mail_user']);
        $mdp = sha1($_POST['mdp_user']);
        $mdp2 = sha1($_POST['mdp2']);
        if(!empty($_POST['pseudo_user']) AND !empty($_POST['mail_user']) AND !empty($_POST['mdp_user']) AND !empty($_POST['mdp2'])) {
           $pseudolength = strlen($pseudo);
           if($pseudolength <= 255) {
              if($mail == $mail) {
                 if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail_user = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                       if($mdp == $mdp2) {
                          $insertmbr = $bdd->prepare("INSERT INTO users(pseudo_user, mail_user, motdepasse_user) VALUES(?, ?, ?)");
                          $insertmbr->execute(array($pseudo, $mail, $mdp));
                          $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                       } else {
                          $erreur = "Vos mots de passes ne correspondent pas !";
                       }
                    } else {
                       $erreur = "Adresse mail déjà utilisée !";
                    }
                 } else {
                    $erreur = "Votre adresse mail n'est pas valide !";
                 }
              } else {
                 $erreur = "Vos adresses mail ne correspondent pas !";
              }
           } else {
              $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
           }
        } else {
           $erreur = "Tous les champs doivent être complétés !";
        }
     }

?>
