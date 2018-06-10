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

foreach (glob("apps/*.php") as $file ) {
}

include 'apps/TipoPermisoApp.php';
include 'apps/TipoPermisoApp.php';
