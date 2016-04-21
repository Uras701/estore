<?php

    use Symfony\Component\HttpFoundation\Request;

    require_once __DIR__ . '/../vendor/autoload.php';

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), [
        'twig.path' => __DIR__ . '/../views',
    ]);

    /* Routes */

    // Main page
    $app->get('/', function () use ($app) {
        return $app['twig']->render('index.twig');
    });

    $app['debug'] = true;

    Request::enableHttpMethodParameterOverride();

    $app->run();

