<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// Doctrine
$container['em'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container['App\Action\HomeAction'] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
};

$container['App\Action\PhotoAction'] = function ($c) {
    $photoResource = new \App\Resource\PhotoResource($c->get('em'));
    return new App\Action\PhotoAction($photoResource);
};


$container['App\Action\EmployerAction'] = function ($c) {
    $employerResource = new \App\Resource\EmployerResource($c->get('em'));
    return new App\Action\EmployerAction($employerResource);
};

$container['App\Action\UserAction'] = function ($c) {
    $userResource = new \App\Resource\UserResource($c->get('em'));
    return new App\Action\UserAction($userResource);
};

$container['App\Action\ReservationAction'] = function ($c) {
    $reservationResource = new \App\Resource\ReservationResource($c->get('em'));
    return new App\Action\ReservationAction($reservationResource);
};

$container['App\Action\AnnonceAction'] = function ($c) {
    $annonceResource = new \App\Resource\AnnonceResource($c->get('em'));
    return new App\Action\AnnonceAction($annonceResource);
};
$container['App\Action\ImageAction'] = function ($c) {
    $imageResource = new \App\Resource\ImageResource($c->get('em'));
    return new App\Action\ImageAction($imageResource);
};
$container['App\Action\PersonneAction'] = function ($c) {
    $personneResource = new \App\Resource\PersonneResource($c->get('em'));
    return new App\Action\AnnonceAction($personneResource);
};

$container['App\Action\ShortcollocationAction'] = function ($c) {
    $shortcollocationResource = new \App\Resource\ShortcollocationResource($c->get('em'));
    return new App\Action\ShortcollocationAction($shortcollocationResource);
};