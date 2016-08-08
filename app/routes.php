<?php
// Routes

$app->get('/api/photos', 'App\Action\PhotoAction:fetch');
$app->get('/api/photos/{slug}', 'App\Action\PhotoAction:fetchOne');


$app->post('/api/employers', 'App\Action\EmployerAction:fetch');


$app->post('/api/users', 'App\Action\UserAction:fetch');
$app->post('/api/user', 'App\Action\UserAction:fetchOne');
$app->post('/api/signup', 'App\Action\UserAction:update');
$app->post('/api/signin', 'App\Action\UserAction:login');



// lister tout les annonces
$app->post('/api/Annonces', 'App\Action\AnnonceAction:fetch');

// get one annonce with that criteria  or get the first one
$app->post('/api/Annonce', 'App\Action\AnnonceAction:fetchOne');

//lister annonces with criterias ---- recherche par criteres
$app->post('/api/AnnoncesC', 'App\Action\AnnonceAction:fetchSelected');
//--------------------------------------------------------------------------------
//***********************************************************************
//*******************************Images ********************************
//***********************************************************************

// lister tout les images
$app->post('/api/ImagesAll', 'App\Action\ImageAction:fetchAll');
// get one image by idimage
$app->post('/api/Image', 'App\Action\ImageAction:fetchOne');
//lister images with criterias ---- recherche par  data / type/ idannonce ...
$app->post('/api/Images', 'App\Action\ImageAction:fetchSelected');
