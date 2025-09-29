<?php
// SOUS-ROUTER posts

use \App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';


switch ($_GET['posts']):
    case 'show':
        PostsController\showAction($connexion, $_GET['id']);
        break;
    case 'edit':
        PostsController\editAction($connexion, $_GET['id']);
        break;
    case 'update':
        PostsController\updateAction($connexion, $_GET['id']);
        break;
    default:
        PostsController\indexAction($connexion);
        break;
endswitch;
