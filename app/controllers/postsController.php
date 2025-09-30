<?php

namespace App\Controllers\PostsController;

use \PDO, \App\Models\PostsModel;

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
    header('Location: ' . PUBLIC_BASE_URL . '/index.php?posts=show&id=' . $id);
}

function newAction(PDO $connexion)
{
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);

    global $title, $content;
    $title = "Add a post";
    ob_start();
    include '../app/views/posts/new.php';
    $content = ob_get_clean();
}

function createAction(PDO $connexion)
{
    $title       = $_POST['title'] ?? '';
    $text        = $_POST['text'] ?? '';
    $quote       = $_POST['quote'] ?? '';
    $category_id = (int)($_POST['category_id'] ?? 0);

    include_once '../app/models/postsModel.php';
    \App\Models\PostsModel\create($connexion, [
        'title'       => $title,
        'text'        => $text,
        'quote'       => $quote,
        'category_id' => $category_id
    ]);

    header('Location: ' . PUBLIC_BASE_URL . 'index.php?posts=index');
    exit;
}

function deleteAction(PDO $connexion, int $id)
{
    include_once '../app/models/postsModel.php';
    \App\Models\PostsModel\deleteOneById($connexion, $id);

    header('Location: ' . PUBLIC_BASE_URL . 'index.php?posts=index');
}
