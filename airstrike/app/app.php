<?php

$app->options('/{catch:(.*)}', function() use ($app) { 
    $app->response->setStatusCode(200, "OK")
    ->setHeader("Access-Control-Allow-Origin", '*')
    ->setHeader("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE,OPTIONS')
    ->setHeader("Access-Control-Allow-Headers", 'Origin, X-Requested-With, Content-Range, Content-Disposition, Content-Type, Authorization')
    ->setHeader("Access-Control-Allow-Credentials", true)
    ->send();
});

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
include 'apps/AuthApp.php';
include 'apps/CiudadApp.php';
include 'apps/ContactoApp.php';
include 'apps/DetalleVueloApp.php';
include 'apps/EstadoApp.php';
include 'apps/GatewayApp.php';
include 'apps/HorarioApp.php';
include 'apps/ItinerarioApp.php';
include 'apps/LineaAreaApp.php';
include 'apps/MenuApp.php';
include 'apps/PaisApp.php';
include 'apps/PermisoApp.php';
include 'apps/PrecioClaseApp.php';
include 'apps/RolApp.php';
include 'apps/TipoPermisoApp.php';
include 'apps/VueloApp.php';
include 'apps/ProgramacionVueloApp.php';
include 'apps/UsuarioApp.php';
include 'apps/TipoAvionApp.php';
include 'apps/ModeloAvionApp.php';
include 'apps/TipoClaseApp.php';
include 'apps/CapacidadClaseApp.php';
include 'apps/AvionApp.php';
include 'apps/CLienteApp.php';
include 'apps/CNaturalApp.php';
include 'apps/CEmpresaApp.php';
include 'apps/RegistroPagoApp.php';
include 'apps/ReservacionApp.php';
