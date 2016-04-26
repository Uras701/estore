<?php

use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$app = new Silex\Application();

$app->register(new HttpFragmentServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(),
    [
        'twig.path' => __DIR__ . '/../views',
    ]);

$app->register(new Silex\Provider\DoctrineServiceProvider(),
    [
        'dbs.options' => [
            'estore' => [
                'driver'   => 'pdo_mysql',
                'host'     => getenv('MYSQL_DB_HOST'),
                'dbname'   => getenv('MYSQL_DB_NAME'),
                'user'     => getenv('MYSQL_DB_USER'),
                'password' => getenv('MYSQL_DB_PASSWORD'),
                'charset'  => 'utf8mb4',
            ],
        ],
    ]);

$app->register(new WebProfilerServiceProvider(),
    [
        'profiler.cache_dir'    => __DIR__ . '/../cache/profiler',
        'profiler.mount_prefix' => '/_profiler', // this is the default
    ]);

/* Routes */

// Main page
$app->get('/',
    function () use ($app) {
        return $app['twig']->render('index.twig');
    });

$app['debug'] = true;

Request::enableHttpMethodParameterOverride();

$app->run();

