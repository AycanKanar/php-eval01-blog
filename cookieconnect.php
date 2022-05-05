<?php
if(!isset($_SESSION['id']) AND isset($_COOKIE['email_user'],$_COOKIE['motdepasse_user']) AND !empty($_COOKIE['email_user']) AND !empty($_COOKIE['motdepasse_user'])) {
   $requser = $bdd->prepare("SELECT * FROM users WHERE mail_user = ? AND motdepasse_user = ?");
   $requser->execute(array($_COOKIE['email_user'], $_COOKIE['password_user']));
   $userexist = $requser->rowCount();
   if($userexist == 1)
   {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo_user'] = $userinfo['pseudo_user'];
      $_SESSION['mail_user'] = $userinfo['mail_user'];
   }
}
?>