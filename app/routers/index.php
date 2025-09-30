<?php
include_once '../core/helpers.php';
// Charger toutes les catégories pour l'aside
include_once '../app/models/categoriesModel.php';
$categories = \App\Models\CategoriesModel\findAll($connexion);

//  Route des posts

if (isset($_GET['posts'])):
    include_once '../app/routers/posts.php';


// Route par défaut:
// PATTERN: /
// CTRL: postsController
// ACTION: index

else:
    include_once '../app/controllers/postsController.php';
    \App\Controllers\PostsController\indexAction($connexion);
endif;
