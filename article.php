<?php
$bdd = new PDO("mysql:host=localhost;dbname=eval01;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));
    if($article->rowCount() == 1) {
       $article = $article->fetch();
       $id = $article['id'];
       $titre = $article['titre'];
       $contenu = $article['contenu'];
       $date = $article['date_time_publication'];
       $qui = 'azraheal';
    } else {
       die('Cet article n\'existe pas !');
    }
 } else {
    die('Erreur');
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <title>Accueil</title>
    <meta charset="utf-8">
 </head>
 <body>
    <img src="miniatures/<?= $id ?>.jpg" width="400" />
    <h1><?= $titre ?></h1>
    <p><?= $contenu ?></p>
    <p>Poster le : <?= $date ?></p>
    <p>Cree par : <?= $qui ?></p>
    <br>
    <br>
    <a href="index.php"> << Retour</a>
 </body>
 </html>