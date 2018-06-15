<?php
/**
 *Inicio de rutas para capacidadClase
 */

$app->get('/api/capacidadclase', function() use ($app){

    $capacidadClases = CapacidadClase::getAll();
    $data = array();
    foreach ($capacidadClases as $capacidadClase){
      $data[]=array(
        'id' => $capacidadClase->id,
        'cantidad' => $capacidadClase->cantidad,
        'id_clases' => $capacidadClase->id_clases,
        'modelo_avion_id' => $capacidadClase->modelo_avion_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/capacidadclase/{id:[0-9]+}', function($id) use ($app){

    $capacidadClases = CapacidadClase::getById($id);
    $data = array();
    foreach ($capacidadClases as $capacidadClase){
      $data[]=array(
        'id' => $capacidadClase->id,
        'cantidad' => $capacidadClase->cantidad,
        'id_clases' => $capacidadClase->id_clases,
        'modelo_avion_id' => $capacidadClase->modelo_avion_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/capacidadclase', function() use ($app){
    $capacidadClase=$app->request->getJsonRawBody();
    CapacidadClase::addCapacidadClase($capacidadClase);
});

$app->put('/api/capacidadclase/{id:[0-9]+}', function($id) use ($app){
    $capacidadClase=$app->request->getJsonRawBody();
    var_dump($capacidadClase);
    CapacidadClase::updateCapacidadClase($id, $capacidadClase);
});

$app->delete('/api/capacidadclase/{id:[0-9]+}', function($id) use ($app){

    CapacidadClase::deleteCapacidadClase($id);
});
/**
 *Fin de rutas para CapacidadClase
 */
