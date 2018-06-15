<?php
/**
 *Inicio de rutas para TipoAvion
 */

$app->get('/api/tipoavion', function() use ($app){

    $tipoAviones = TipoAvion::getAll();
    $data = array();
    foreach ($tipoAviones as $tipoAvion){
      $data[]=array(
        'id' => $tipoAvion->id,
        'nombre' => $tipoAvion->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/tipoavion/{id:[0-9]+}', function($id) use ($app){

    $tipoAviones = TipoAvion::getById($id);
    $data = array();
    foreach ($tipoAviones as $tipoAvion){
      $data[]=array(
        'id' => $tipoAvion->id,
        'nombre' => $tipoAvion->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/tipoavion', function() use ($app){
    $tipoAvion=$app->request->getJsonRawBody();
    TipoAvion::addTipoAvion($tipoAvion);  
});

$app->put('/api/tipoavion/{id:[0-9]+}', function($id) use ($app){
    $tipoAvion=$app->request->getJsonRawBody();
    var_dump($tipoAvion);
    TipoAvion::updateTipoAvion($id, $tipoAvion);
});

$app->delete('/api/tipoavion/{id:[0-9]+}', function($id) use ($app){

    TipoAvion::deleteTipoAvion($id);
});
/**
 *Fin de rutas para TipoAvion
 */
