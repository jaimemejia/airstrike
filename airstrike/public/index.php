<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;
use Dmkit\Phalcon\Auth\Middleware\Micro as AuthMicro;

error_reporting(E_ALL);
require_once __DIR__ . '/../../vendor/autoload.php';
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {

    /**
     * The FactoryDefault Dependency Injector automatically registers the services that
     * provide a full stack framework. These default services can be overidden with custom ones.
     */
    $di = new FactoryDefault();

    /**
     * Include Services
     */
    include APP_PATH . '/config/services.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Starting the application
     * Assign service locator to the application
     */
    $app = new Micro($di);

    /*
     *Configuración de JWT
     *
     */
     // SETUP THE CONFIG
$authConfig = [
    'secretKey' => '923753F2317FC1EE5B52DF23951B1',
    'payload' => [
            'exp' => 1440,
            'iss' => 'phalcon-jwt-auth'
        ],
     'ignoreUri' => [
            '/',
            'regex:/application/',
            'regex:/users/:POST,PUT',
            '/auth/user:POST,PUT',
            '/auth/application',
            '/airstrike/airstrike/api/login',
            '/airstrike/api/login',
        ]
];

// AUTH MICRO
$auth = new AuthMicro($app, $authConfig);

    /**
     * Include Application
     */
    include APP_PATH . '/app.php';

    /**
     * Handle the request
     */
    $app->handle();

} catch (\Exception $e) {
      echo $e->getMessage() . '<br>';
      echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
