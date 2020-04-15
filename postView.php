
<?php $title = 'Commentaires'; ?>

<?php ob_start(); ?>
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
        $comments->closeCursor();
            ?>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>