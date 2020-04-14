<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commentaires</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Mon super blog!</h1>
<a href="index.php">Retour à la liste des billets</a>
    <?php
        try {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        }
    $responses = $bdd->prepare('SELECT titre , contenu, 
       DAY(date_creation) AS jour, 
       MONTH(date_creation) AS mois, 
       YEAR(date_creation) AS annee, 
       HOUR(date_creation) AS heure, 
       MINUTE(date_creation) AS minute, 
       SECOND(date_creation) AS seconde FROM billets WHERE id = ?  ' );
        $responses->execute(array($_GET['id_billet']));
        $donnees = $responses->fetch() ?>

            <div class="news">
               <h3>
                   <?php echo $donnees['titre'] . ' le ' . $donnees['jour'] . '/' . $donnees['mois'] .'/' . $donnees['annee'] .' à '
                       . $donnees['heure'] .'h' . $donnees['minute'] . 'm' . $donnees['seconde'] . 's' ; ?>
               </h3>
               <p>
                   <?php echo $donnees['contenu']; ?>
               </p>
           </div>
            <div class="commentaires">
                <h2>Commentaires</h2>
                <?php
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                $responses = $bdd->prepare('SELECT auteur , commentaire, 
       DAY(date_commentaire) AS jour, 
       MONTH(date_commentaire) AS mois, 
       YEAR(date_commentaire) AS annee, 
       HOUR(date_commentaire) AS heure, 
       MINUTE(date_commentaire) AS minute, 
       SECOND(date_commentaire) AS seconde FROM commentaires WHERE id_billet = ?  ' );
                $responses->execute(array($_GET['id_billet']));
                while ($donnees = $responses->fetch()){ ?>

                    <p>
                        <?php echo'<strong>' . $donnees['auteur'] . '</strong>' . ' le ' . $donnees['jour'] . '/' . $donnees['mois'] .'/' . $donnees['annee'] .' à '
                            . $donnees['heure'] .'h' . $donnees['minute'] . 'm' . $donnees['seconde'] . 's'. '<br />' . $donnees['commentaire']  ; ?>
                    </p>
                    <?php
                }
                ?>
            </div>
</body>
</html>