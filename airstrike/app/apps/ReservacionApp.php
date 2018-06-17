<?php
/**
 *Inicio de rutas para Reservacion
 */
use Phalcon\Http\Response;
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
 // echo json_encode($data,JSON_PRETTY_PRINT);
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
 // echo json_encode($data,JSON_PRETTY_PRINT);
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

$app->post('/api/reservacion', function() use ($app){
    $reservacion=$app->request->getJsonRawBody();
  //  Reservacion::addReservacion($reservacion);
   $response = new Response();
  $reservacion=$app->request->getJsonRawBody();
    var_dump($reservacion);
    if( Reservacion::addReservacion($reservacion)){
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

$app->put('/api/reservacion/{id:[0-9]+}', function($id) use ($app){
    $reservacion=$app->request->getJsonRawBody();
    var_dump($reservacion);
   // Reservacion::updateReservacion($id, $reservacion);
    $response = new Response();
  $reservacion=$app->request->getJsonRawBody();
    var_dump($reservacion);
    if(Reservacion::updateReservacion($id, $reservacion)){
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

$app->delete('/api/reservacion/{id:[0-9]+}', function($id) use ($app){

  //  Reservacion::deleteReservacion($id);

  $response = new Response();
  $reservacion=$app->request->getJsonRawBody();
    var_dump($reservacion);
    if( Reservacion::deleteReservacion($id)){
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
 *Fin de rutas para Reservacion
 */
