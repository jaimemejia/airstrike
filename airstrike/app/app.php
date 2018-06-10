<?php

$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */
$app->get('/', function () {
    echo $this['view']->render('index');
});


include 'apps/AeropuertoApp.php';
include 'apps/CiudadApp.php';
include 'apps/ContactoApp.php';
include 'apps/EstadoApp.php';
include 'apps/GatewayApp.php';
include 'apps/HorarioApp.php';
include 'apps/LineaAreaApp.php';
include 'apps/MenuApp.php';
include 'apps/PaisApp.php';
include 'apps/PermisoApp.php';
include 'apps/RolApp.php';
include 'apps/TipoPermisoApp.php';
