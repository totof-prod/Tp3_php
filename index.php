<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon super blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Mon super blog!</h1>
    Derniers billet du blog:
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $response = $bdd->query('SELECT id, titre , contenu, 
       DAY(date_creation) AS jour, 
       MONTH(date_creation) AS mois, 
       YEAR(date_creation) AS annee, 
       HOUR(date_creation) AS heure, 
       MINUTE(date_creation) AS minute, 
       SECOND(date_creation) AS seconde FROM billets ORDER BY id DESC LIMIT 10 ' );
    while ($donnees = $response->fetch())
    {?>
        <div class="news">
            <h3>
                <?php echo $donnees['titre'] . ' le ' . $donnees['jour'] . '/' . $donnees['mois'] .'/' . $donnees['annee'] .' à '
                . $donnees['heure'] .'h' . $donnees['minute'] . 'm' . $donnees['seconde'] . 's' ; ?>
            </h3>
                <p>
                    <?php echo $donnees['contenu']; ?></br>
                    <a href="commentaires.php?id_billet=<?php echo $donnees['id'] ; ?>">Commentaires</a>
                </p>

        </div>

   <?php
    }
    ?>


</body>
</html>