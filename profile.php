<?php
session_start();
 
$bdd = new PDO("mysql:host=localhost;dbname=eval01;charset=utf8", "root", "");
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
       
      <div>
         <h2>Profil de <?php echo $userinfo['pseudo_user']; ?></h2>
         <br /><br />
         <?php
         if(!empty($userinfo['avatar'])) {
            ?>
               <img src="avatars/<?php echo $userinfo['avatar']; ?>" alt="" width="150">
            <?php
         }
         ?>
         <br>
         <br>
         Pseudo = <?php echo $userinfo['pseudo_user']; ?>
         <br />
         Mail = <?php echo $userinfo['mail_user']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofile.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <a href="index.php">index</a>

         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>