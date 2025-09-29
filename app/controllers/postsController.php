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
function editAction(PDO $connexion, int $id)
{

    // Je vais demander des données au model
    include_once '../app/models/postsModel.php';
    $post = \App\Models\PostsModel\findOneById($connexion, $id);

    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);

    // Je chrage la vue '' dans $content
    global $content, $title;
    $title = ['Edit a post'];
    ob_start();
    include '../app/views/posts/edit.php';
    $content = ob_get_clean();
}

function updateAction(PDO $connexion, int $id)
{

    $title       = $_POST['title'] ?? '';
    $text        = $_POST['text'] ?? '';
    $quote       = $_POST['quote'] ?? '';
    $category_id  = (int)($_POST['category_id'] ?? 0);

    include_once '../app/models/postsModel.php';
    \App\Models\PostsModel\updateOneById($connexion, $id, $title, $text, $quote, $category_id);
    header('location: ' . PUBLIC_BASE_URL . 'posts');
}
