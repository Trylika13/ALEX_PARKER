<?php
// ROUTER PRINCIPAL


// ROUTE PAR DEFAUT
// PATTERN:
// CTRL: 
// ACTION : indexAction
include_once '../app/controllers/postsController.php';
\App\Controllers\PostsController\indexAction($connexion);
