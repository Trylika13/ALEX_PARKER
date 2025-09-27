<?php

namespace App\Controllers\PostsController;

use \PDO;

function indexAction(PDO $connexion)
{

    // Je vais demander des données au model
    include_once '../app/models/postsModel.php';
    $posts = \App\Models\PostsModel\findAll($connexion);
    // Je chrage la vue '' dans $content

    global $content, $title;
    $title = "Blog";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $connexion, int $id)
{

    // Je vais demander des données au model
    include_once '../app/models/postsModel.php';
    $post = \App\Models\PostsModel\findOneById($connexion, $id);
    // Je chrage la vue '' dans $content

    global $content, $title;
    $title = $post['title'];
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}
