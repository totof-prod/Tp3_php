<?php
function getPosts()
{
    $db = dbConnect();
    return $db->query('SELECT id, title, content, 
       DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
}

function getPost($postId)
{
    $db = dbConnect();
    $responses = $db->prepare('SELECT id, title , content, 
        DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?  ');
    $responses->execute(array($postId));

    return $responses->fetch();
}

function getComments($postId)
{

    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author , comment, 
        DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ?  ');
    $comments->execute(array($postId));

    return $comments;

}

function dbConnect(){

    return new PDO('mysql:host=localhost:8889;dbname=blog;charset=utf8', 'root', 'root');

}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    return $comments->execute(array($postId, $author, $comment));
}
