<?php
/**
 *Inicio de rutas para Reservacion
 */

$app->get('/api/reservacion', function() use ($app){

    $reservaciones = Reservacion::getAll();
    $data = array();
    foreach ($reservaciones as $reservacion){
      $data[]=array(
         'id' => $reservacion->id,
        'asiento_reservados' => $reservacion->asiento_reservados,
        'cantidad_maletas' => $reservacion->cantidad_maletas,
        'id_cliente' => $reservacion->id_cliente,
        'itinerario_id' => $reservacion->itinerario_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/reservacion/{id:[0-9]+}', function($id) use ($app){

    $reservaciones = Reservacion::getById($id);
    $data = array();
    foreach ($reservaciones as $reservacion){
      $data[]=array(
        'id' => $reservacion->id,
        'asiento_reservados' => $reservacion->asiento_reservados,
        'cantidad_maletas' => $reservacion->cantidad_maletas,
        'id_cliente' => $reservacion->id_cliente,
        'itinerario_id' => $reservacion->itinerario_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/reservacion', function() use ($app){
    $reservacion=$app->request->getJsonRawBody();
    Reservacion::addReservacion($reservacion);
});

$app->put('/api/reservacion/{id:[0-9]+}', function($id) use ($app){
    $reservacion=$app->request->getJsonRawBody();
    var_dump($reservacion);
    Reservacion::updateReservacion($id, $reservacion);
});

$app->delete('/api/reservacion/{id:[0-9]+}', function($id) use ($app){

    Reservacion::deleteReservacion($id);
});
/**
 *Fin de rutas para Reservacion
 */
