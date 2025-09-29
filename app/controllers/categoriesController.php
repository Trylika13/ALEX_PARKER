<?php

namespace App\Controllers\CategoriesController;

use \PDO;

function indexAction(PDO $connexion)
{

    // Je vais demander des données au model
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);
    // Je chrage la vue '' dans $content


}
