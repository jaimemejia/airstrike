<?php
/**
 *Inicio de rutas para ModeloAvion
 */

$app->get('/api/modeloavion', function() use ($app){

    $modeloAviones = ModeloAvion::getAll();
    $data = array();
    foreach ($modeloAviones as $modeloAvion){
      $data[]=array(
        'id' => $modeloAvion->id,
        'nombre_modelo' => $modeloAvion->nombre_modelo,
        'marca' => $modeloAvion->marca,
        'cantidad_maleta' => $modeloAvion->cantidad_maleta,
        'cantidad_asientos' => $modeloAvion->cantidad_asientos,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/modeloavion/{id:[0-9]+}', function($id) use ($app){

    $modeloAviones = ModeloAvion::getById($id);
    $data = array();
    foreach ($modeloAviones as $modeloAvion){
      $data[]=array(
        'id' => $modeloAvion->id,
        'nombre_modelo' => $modeloAvion->nombre_modelo,
        'marca' => $modeloAvion->marca,
        'cantidad_maleta' => $modeloAvion->cantidad_maleta,
        'cantidad_asientos' => $modeloAvion->cantidad_asientos,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/modeloavion', function() use ($app){
    $modeloAvion=$app->request->getJsonRawBody();
    ModeloAvion::addModeloAvion($modeloAvion);
});

$app->put('/api/modeloavion/{id:[0-9]+}', function($id) use ($app){
    $modeloAvion=$app->request->getJsonRawBody();
    var_dump($modeloAvion);
    ModeloAvion::updateModeloAvion($id, $modeloAvion);
});

$app->delete('/api/modeloavion/{id:[0-9]+}', function($id) use ($app){

    ModeloAvion::deleteModeloAvion($id);
});
/**
 *Fin de rutas para ModeloAvion
 */
