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

            <div class="news">
                <h3>
                    <?= htmlspecialchars($post['title']) ?>
                    <em>le <?= $post['creation_date_fr'] ?></em>
                </h3>

                <p>
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </p>
            </div>
            <div class="commentaires">
                <h2>Commentaires</h2>

                <?php
                while ($comment = $comments->fetch())
                {
                    ?>
                    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    <?php
                }
                ?>
            </div>
</body>
</html>