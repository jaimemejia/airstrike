<?php

/**
 *Inicio de rutas para Estado
 */

$app->get('/api/estado', function() use ($app){

    $estados = Estado::getAll();
    $data = array();
    foreach ($estados as $estado){
      $data[]=array(
        'id' => $estado->id,
        'nombre' => $estado->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/estado/{id:[0-9]+}', function($id) use ($app){

    $estados = Estado::getById($id);
    $data = array();
    foreach ($estados as $estado){
      $data[]=array(
        'id' => $estado->id,
        'nombre' => $estado->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/estado', function() use ($app){
    $estado=$app->request->getJsonRawBody();
    Estado::addEstado($estado);
});

$app->put('/api/estado/{id:[0-9]+}', function($id) use ($app){
    $estado=$app->request->getJsonRawBody();
    var_dump($estado);
    Estado::updateEstado($id, $estado);
});

$app->delete('/api/estado/{id:[0-9]+}', function($id) use ($app){

    Estado::deleteEstado($id);
});
/**
 *Fin de rutas para TipoPermiso
 */
