<?php
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

/**
 *Inicio de rutas para TipoPermiso
 */

$app->get('/api/tipopermiso', function() use ($app){

    $tipoPermisos = TipoPermiso::getAll();
    $data = array();
    foreach ($tipoPermisos as $tipoPermiso){
      $data[]=array(
        'id' => $tipoPermiso->id,
        'nombre' => $tipoPermiso->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){

    $tipoPermisos = TipoPermiso::getById($id);
    $data = array();
    foreach ($tipoPermisos as $tipoPermiso){
      $data[]=array(
        'id' => $tipoPermiso->id,
        'nombre' => $tipoPermiso->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/tipopermiso', function() use ($app){
    $tipoPermiso=$app->request->getJsonRawBody();
    TipoPermiso::addTipoPermiso($tipoPermiso);
});

$app->put('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){
    $tipoPermiso=$app->request->getJsonRawBody();
    var_dump($tipoPermiso);
    TipoPermiso::updateTipoPermiso($id, $tipoPermiso);
});

$app->delete('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){

    TipoPermiso::deleteTipoPermiso($id);
});
/**
 *Fin de rutas para TipoPermiso
 */

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});