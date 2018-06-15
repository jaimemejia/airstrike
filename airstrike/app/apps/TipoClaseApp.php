<?php
/**
 *Inicio de rutas para TipoClase
 */

$app->get('/api/tipoclase', function() use ($app){

    $tipoClases = TipoClase::getAll();
    $data = array();
    foreach ($tipoClases as $tipoClase){
      $data[]=array(
        'id' => $tipoClase->id,
        'nombre' => $tipoClase->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/tipoclase/{id:[0-9]+}', function($id) use ($app){

    $tipoClases = TipoClase::getById($id);
    $data = array();
    foreach ($tipoClases as $tipoClase){
      $data[]=array(
        'id' => $tipoClase->id,
        'nombre' => $tipoClase->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/tipoclase', function() use ($app){
    $tipoClase=$app->request->getJsonRawBody();
    TipoClase::addTipoClase($tipoClase);
});

$app->put('/api/tipoclase/{id:[0-9]+}', function($id) use ($app){
    $tipoClase=$app->request->getJsonRawBody();
    var_dump($tipoClase);
    TipoClase::updateTipoClase($id, $tipoClase);
});

$app->delete('/api/tipoclase/{id:[0-9]+}', function($id) use ($app){

    TipoClase::deleteTipoClase($id);
});
/**
 *Fin de rutas para TipoAvion
 */
