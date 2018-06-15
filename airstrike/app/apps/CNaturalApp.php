<?php
/**
 *Inicio de rutas para ModeloAvion
 */

$app->get('/api/cnatural', function() use ($app){

    $cnaturales = CNatural::getAll();
    $data = array();
    foreach ($cnaturales as $cnatural){
      $data[]=array(
        'id_natural' => $cnatural->id_natural,
        'estado_civil' => $cnatural->estado_civil,
        'genero' => $cnatural->genero,
        'fecha_nacimiento' => $cnatural->fecha_nacimiento,
        'tipo_doc' => $cnatural->tipo_doc,
        'num_doc' => $cnatural->num_doc,
        'id_cliente' => $cnatural->id_cliente
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/cnatural/{id:[0-9]+}', function($id) use ($app){

    $cnaturales = CNatural::getById($id);
     $data = array();
    foreach ($cnaturales as $cnatural){
      $data[]=array(
        'id_natural' => $cnatural->id_natural,
        'estado_civil' => $cnatural->estado_civil,
        'genero' => $cnatural->genero,
        'fecha_nacimiento' => $cnatural->fecha_nacimiento,
        'tipo_doc' => $cnatural->tipo_doc,
        'num_doc' => $cnatural->num_doc,
        'id_cliente' => $cnatural->id_cliente
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/cnatural', function() use ($app){
    $cnatural=$app->request->getJsonRawBody();
    CNatural::addCNatural($cnatural);
});

$app->put('/api/cnatural/{id:[0-9]+}', function($id) use ($app){
    $cnatural=$app->request->getJsonRawBody();
    var_dump($cnatural);
    CNatural::updateCNatural($id, $cnatural);
});

$app->delete('/api/cnatural/{id:[0-9]+}', function($id) use ($app){

    CNatural::deleteCNatural($id);
});
/**
 *Fin de rutas para ModeloAvion
 */
