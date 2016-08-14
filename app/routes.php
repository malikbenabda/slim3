<?php
// Routes

$app->get('/api/photos', 'App\Action\PhotoAction:fetch');
$app->get('/api/photos/{slug}', 'App\Action\PhotoAction:fetchOne');


$app->post('/api/employers', 'App\Action\EmployerAction:fetch');


$app->post('/api/users', 'App\Action\UserAction:fetch');
$app->post('/api/user', 'App\Action\UserAction:fetchOne');
$app->post('/api/signup', 'App\Action\UserAction:update');
$app->post('/api/signin', 'App\Action\UserAction:login');


// insert annonce
$app->post('/api/AnnonceAdd', 'App\Action\AnnonceAction:add');
// delete single annonce by idannonce
$app->post('/api/AnnonceRemove', 'App\Action\AnnonceAction:remove');
//  update if idannonce is passed , else insert
$app->post('/api/AnnonceUpdate', 'App\Action\AnnonceAction:update');

// lister tout les annonces
$app->post('/api/Annonces', 'App\Action\AnnonceAction:fetch');

// get one annonce with idannonce or coords
$app->post('/api/Annonce', 'App\Action\AnnonceAction:fetchOne');

//lister annonces with criterias ---- recherche par criteres
$app->post('/api/AnnoncesSelect', 'App\Action\AnnonceAction:fetchSelected');
//--------------------------------------------------------------------------------
//***********************************************************************
//*******************************Images ********************************
//***********************************************************************

// lister tout les images
$app->get('/api/ImageAll', 'App\Action\ImageAction:fetchAll');
// get one image by idimage
$app->post('/api/Image', 'App\Action\ImageAction:fetchOne');
//lister images with criterias ---- recherche par  data / type/ idannonce ...
$app->post('/api/Images', 'App\Action\ImageAction:fetchSelected');
// update /insert image
$app->post('/api/imageUpdate', 'App\Action\ImageAction:updateImage');

