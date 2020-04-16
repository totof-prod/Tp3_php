<?php $title = 'Commentaires'; ?>

<?php ob_start(); ?>


<h1>Modifier le commentaire</h1>
<div class="news">

    <h3>
        <strong><?= htmlspecialchars($comment['author']) ?></strong>
        <em>le <?= $comment['comment_date_fr'] ?></em>
    </h3>
    <p>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    </p>
</div>

    <h2>modifier un commentaires</h2>
    <form action="/index.php?action=modifyComment&amp;id=<?= $comment['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value="<?=$comment['author'] ?>" required />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" required></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>




<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>