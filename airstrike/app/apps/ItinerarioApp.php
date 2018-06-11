<?php

/**
 *Inicio de rutas para Itinerario
 */

$app->get('/api/itinerario', function() use ($app){

    $itinerarios = Itinerario::getAll();
    $data = array();
    foreach ($itinerarios as $itinerario){
      $data[]=array(
        'id' => $itinerario->id,
        'fecha_creacion' => $itinerario->fecha_creacion,
        'origen' => $itinerario->origen,
        'destino' => $itinerario->destino,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/itinerario/{id:[0-9]+}', function($id) use ($app){

    $itinerarios = Itinerario::getById($id);
    $data = array();
    foreach ($itinerarios as $itinerario){
      $data[]=array(
        'id' => $itinerario->id,
        'fecha_creacion' => $itinerario->fecha_creacion,
        'origen' => $itinerario->origen,
        'destino' => $itinerario->destino,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/itinerario', function() use ($app){
    $itinerario=$app->request->getJsonRawBody();
    Itinerario::addItinerario($itinerario);
});

$app->put('/api/itinerario/{id:[0-9]+}', function($id) use ($app){
    $itinerario=$app->request->getJsonRawBody();
    var_dump($itinerario);
    Itinerario::updateItinerario($id, $itinerario);
});

$app->delete('/api/itinerario/{id:[0-9]+}', function($id) use ($app){

    Itinerario::deleteItinerario($id);
});

/**
 *Fin de rutas para Itinerario
 */
