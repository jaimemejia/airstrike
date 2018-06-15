<?php
/**
 *Inicio de rutas para RegistroPago
 */

$app->get('/api/registropago', function() use ($app){

    $registroPagos = RegistroPago::getAll();
    $data = array();
    foreach ($registroPagos as $registroPago){
      $data[]=array(
        'id' => $registroPago->id,
       'precio'=> $registroPago->precio,
       'fecha'=> $registroPago->fecha,
       'reservacion_id'=> $registroPago->reservacion_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/registropago/{id:[0-9]+}', function($id) use ($app){

    $registroPagos = RegistroPago::getById($id);
    $data = array();
    foreach ($registroPagos as $registroPago){
      $data[]=array(
        'id' => $registroPago->id,
        'precio' => $registroPago->precio,
        'fecha' => $registroPago->fecha,
        'reservacion_id' => $registroPago->reservacion_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/registropago', function() use ($app){
    $registroPago=$app->request->getJsonRawBody();
    RegistroPago::addRegistroPago($registroPago);
});

$app->put('/api/registropago/{id:[0-9]+}', function($id) use ($app){
    $registroPago=$app->request->getJsonRawBody();
    var_dump($registroPago);
    RegistroPago::updateRegistroPago($id, $registroPago);
});

$app->delete('/api/registropago/{id:[0-9]+}', function($id) use ($app){

    RegistroPago::deleteRegistroPago($id);
});
/**
 *Fin de rutas para RegistroPago
 */
