<?php

/**
 *Inicio de rutas para DetalleVuelo
 */

$app->get('/api/detallevuelo', function() use ($app){

    $detalleVuelos = DetalleVuelo::getAll();
    $data = array();
    foreach ($detalleVuelos as $detalleVuelo){
      $data[]=array(
        'id' => $detalleVuelo->id,
        'tipo_clase_id' => $detalleVuelo->tipo_clase_id,
        'itinerario_id' => $detalleVuelo->itinerario_id,
        'numero_asiento' => $detalleVuelo->numero_asiento,
        'programacion_vuelo_id' => $detalleVuelo->programacion_vuelo_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/detallevuelo/{id:[0-9]+}', function($id) use ($app){

    $detalleVuelos = DetalleVuelo::getById($id);
    $data = array();
    foreach ($detalleVuelos as $detalleVuelo){
      $data[]=array(
        'id' => $detalleVuelo->id,
        'tipo_clase_id' => $detalleVuelo->tipo_clase_id,
        'itinerario_id' => $detalleVuelo->itinerario_id,
        'numero_asiento' => $detalleVuelo->numero_asiento,
        'programacion_vuelo_id' => $detalleVuelo->programacion_vuelo_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/detallevuelo', function() use ($app){
    $detalleVuelo=$app->request->getJsonRawBody();
    DetalleVuelo::addDetalleVuelo($detalleVuelo);
});

$app->put('/api/detallevuelo/{id:[0-9]+}', function($id) use ($app){
    $detalleVuelo=$app->request->getJsonRawBody();
    var_dump($detalleVuelo);
    DetalleVuelo::updateDetalleVuelo($id, $detalleVuelo);
});

$app->delete('/api/detallevuelo/{id:[0-9]+}', function($id) use ($app){

    DetalleVuelo::deleteDetalleVuelo($id);
});

/**
 *Fin de rutas para DetalleVuelo
 */
