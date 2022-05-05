<?php
session_start();
 
$bdd = new PDO("mysql:host=localhost;dbname=eval01;charset=utf8", "root", "");
 
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM users WHERE mail_user = ? AND motdepasse_user = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo_user'] = $userinfo['pseudo_user'];
         $_SESSION['mail_user'] = $userinfo['mail_user'];
         $_SESSION['connecté']=1;
         $_SESSION['roles']=$userinfo['roles_id'];
         header("Location: profile.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <head>
      <meta charset="utf-8">
      <title>Connexion</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/reset.css">
   </head>
   <body>
      <div>
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="checkbox" name="rememberme" id="remembercheckbox" /><label for="remembercheckbox">Se souvenir de moi</label>
            <br><br>
            <input type="submit" name="formconnexion" value="Se connecter !" />
            <a href="inscription.php">Vous netes pas inscirt ?</a>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>