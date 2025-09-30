<?php

namespace App\Controllers\CategoriesController;

use \PDO;

function indexAction(PDO $connexion)
{


    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);


    global $content;
    ob_start();
    include '../app/templates/partials/_aside.php';
    $content = ob_get_clean();
}
