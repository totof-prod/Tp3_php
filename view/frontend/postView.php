
<?php $title = 'Commentaires'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog!</h1>
    <a href="/index.php">Retour à la liste des billets</a>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
        <?php var_dump($post)?>
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
    <h2>Ajouter un commentaires</h2>
    <form action="/index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>