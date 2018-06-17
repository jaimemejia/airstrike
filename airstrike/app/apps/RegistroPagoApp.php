<?php
use Phalcon\Http\Response;
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
  //echo json_encode($data,JSON_PRETTY_PRINT);
    $response = new Response();

    // Check if the insertion was successful
    if ( sizeof($data) >0 ) {
        // Change the HTTP status
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
            [
                'status' => 'OK',
                'data'   => $data,
            ]
        );
    } else {
        // Change the HTTP status
        $response->setStatusCode(200, 'Succeed');

        // Send errors to the client

        $response->setJsonContent(
            [
                'status'   => 'ERROR'
            ]
        );
    }

    $response->setHeader('Access-Control-Allow-Origin', '*');
    $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');   
    return $response;
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
  //echo json_encode($data,JSON_PRETTY_PRINT);
    $response = new Response();

    // Check if the insertion was successful
    if ( sizeof($data) >0 ) {
        // Change the HTTP status
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
            [
                'status' => 'OK',
                'data'   => $data,
            ]
        );
    } else {
        // Change the HTTP status
        $response->setStatusCode(200, 'Succeed');

        // Send errors to the client

        $response->setJsonContent(
            [
                'status'   => 'ERROR'
            ]
        );
    }

    $response->setHeader('Access-Control-Allow-Origin', '*');
    $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');   
    return $response;
});

$app->post('/api/registropago', function() use ($app){
    $registroPago=$app->request->getJsonRawBody();
   // RegistroPago::addRegistroPago($registroPago);
    $response = new Response();
  $registroPago=$app->request->getJsonRawBody();
    var_dump($registroPago);
    if(RegistroPago::addRegistroPago($registroPago)){
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
          [
              'status' => 'OK',
          ]
      );
    }else{
        $response->setStatusCode(200, 'Succeed');

      // Send errors to the client

      $response->setJsonContent(
          [
              'status'   => 'ERROR'
          ]
      );
    }
  $response->setHeader('Access-Control-Allow-Origin', '*');
    $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');   
    return $response;
});

$app->put('/api/registropago/{id:[0-9]+}', function($id) use ($app){
    $registroPago=$app->request->getJsonRawBody();
    var_dump($registroPago);
   // RegistroPago::updateRegistroPago($id, $registroPago);
    $response = new Response();
  $registroPago=$app->request->getJsonRawBody();
    var_dump($registroPago);
    if(RegistroPago::updateRegistroPago($id, $registroPago)){
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
          [
              'status' => 'OK',
          ]
      );
    }else{
        $response->setStatusCode(200, 'Succeed');

      // Send errors to the client

      $response->setJsonContent(
          [
              'status'   => 'ERROR'
          ]
      );
    }
  $response->setHeader('Access-Control-Allow-Origin', '*');
    $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');   
    return $response;
});

$app->delete('/api/registropago/{id:[0-9]+}', function($id) use ($app){

   // RegistroPago::deleteRegistroPago($id);
  $response = new Response();
  $registroPago=$app->request->getJsonRawBody();
    var_dump($registroPago);
    if(RegistroPago::deleteRegistroPago($id)){
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
          [
              'status' => 'OK',
          ]
      );
    }else{
        $response->setStatusCode(200, 'Succeed');

      // Send errors to the client

      $response->setJsonContent(
          [
              'status'   => 'ERROR'
          ]
      );
    }
  $response->setHeader('Access-Control-Allow-Origin', '*');
    $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');   
    return $response;
});
/**
 *Fin de rutas para RegistroPago
 */
