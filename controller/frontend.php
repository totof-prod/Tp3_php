<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts(){
    $postManager = new TP_BLOG\model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/indexView.php');
}

function post(){

    $postManager = new TP_BLOG\model\PostManager();
    $commentmanager = new TP_BLOG\model\CommentManager();


    $post = $postManager->getPost($_GET['id']);

    $comments = $commentmanager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentmanager = new TP_BLOG\model\CommentManager();
    $affectedLines = $commentmanager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function Comment(){
    $commentmanager = new TP_BLOG\model\CommentManager();

    $comment = $commentmanager->getComment($_GET['id']);

    require('view/frontend/commentView.php');

}
function modifyComment($commentId, $author, $comment){
    $commentmanager = new TP_BLOG\model\CommentManager();
    $comments = $commentmanager->getComment($_GET['id']);
    $postId = $comments['post_id'];

    $affectedLines = $commentmanager->modifyComment($commentId, $author, $comment);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }

}