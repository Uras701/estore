<?php

    use Symfony\Component\HttpFoundation\Request;

    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

// ... definitions

    /* Routes */

    $app->get('/', function ($id) {
        echo '<h1>Hello World!</h1>';
        echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae exercitationem, explicabo, in iste laudantium necessitatibus placeat quae quasi quis quisquam quod reiciendis, repellat sint sit sunt ullam voluptas! Expedita, odio?</h1>';
    });

    $app['debug'] = true;

    Request::enableHttpMethodParameterOverride();

    $app->run();

