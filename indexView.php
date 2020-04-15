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
while ($data = $posts->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($data['content'])); ?>
            <br />
            <em><a href="post.php?id=<?= $data['id'] ; ?>">Commentaires</a></em>
        </p>

    </div>

    <?php
}
$posts->closeCursor();
?>


</body>
</html>
