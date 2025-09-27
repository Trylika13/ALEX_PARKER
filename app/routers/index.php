<?php

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
