<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=eval01;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/reset.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">
                Accueil
            </a></li>
                <li>
                <?php
                  if (isset($_SESSION['roles'])) {
                    if ($_SESSION['roles']==1)
                    {
                        ?>
                            <a href="creation.php">Ajouter article </a>
                    <?php
                  }} else
                  {
                      echo '';
                  }
                
         ?>
                </li>
                <li class="navigation_droite">
                <?php
                if (isset($_SESSION['roles'])) {
                if ($_SESSION['connecté']==1)
                {
                    echo '<a href="deconnexion.php">deconnexion</a>';
                }} else
                {
                    echo '<a href="connexion.php">connexion</a>';
                }
           
                ?>
                </li>
        </ul>
    </nav>

    <ul>
      <?php while($a = $articles->fetch()) { ?>
      <li>
         <a href="article.php?id=<?= $a['id'] ?>">
            <img src="miniatures/<?= $a['id'] ?>.jpg" width="100" /><br />
            <?= $a['titre'] ?>
         </a>
         <?php
                if (isset($_SESSION['roles'])) {
                  if ($_SESSION['roles']==1)
                  {
                      ?>
                        | <a href="creation.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="supprimer.php?id=<?= $a['id'] ?>">Supprimer</a>
                      <?php
                  }} else
                  {
                      echo '';
                  }
         ?>

      </li>
      <?php } ?>
   <ul>
</body>
</html>