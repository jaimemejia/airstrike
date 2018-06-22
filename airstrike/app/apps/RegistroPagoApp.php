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
    //Declaraciones
    $response=new Response();
    $itinerario=new \stdClass();
    $reservacion=new \stdClass();
    $detalle_vuelo=new \stdClass();
    $registro_pago=new \stdClass();

    $registroPago_json=$app->request->getJsonRawBody();

    $itinerario->origen = $registroPago_json->origen;
    $itinerario->destino = $registroPago_json->destino;
    $itinerario->id =Itinerario::addItinerario($itinerario)[0]->create_itinerario;
    if($itinerario->id){

      $detalle_vuelo->tipo_clase_id=$registroPago_json->tipo_clase_id;
      $detalle_vuelo->numero_asiento=$registroPago_json->numero_asiento;
      $detalle_vuelo->itinerario_id=$itinerario->id;
      $detalle_vuelo->programacion_vuelo_id=$registroPago_json->programacion_vuelo_id;

      DetalleVuelo::addDetalleVuelo($detalle_vuelo);

      $reservacion->asiento_reservados=$registroPago_json->asiento_reservados;
      $reservacion->cantidad_maletas=$registroPago_json->cantidad_maletas;
      $reservacion->id_cliente=$registroPago_json->id_cliente;
      $reservacion->itinerario_id= $itinerario->id;
      $reservacion->id= Reservacion::addReservacion($reservacion)[0]->create_reservacion;

      if($reservacion->id){
        $registro_pago->precio=$registroPago_json->precio;
        $registro_pago->reservacion_id=$reservacion->id;

        if(RegistroPago::addRegistroPago($registro_pago)){
          $response->setStatusCode(200, 'Succeed');
          $response->setJsonContent([
            'status' => 'OK',
          ]);
        }
      }


    }
    else{

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

$app->put('/api/registropago/{id:[0-9]+}', function($id) use ($app){
    $registroPago=$app->request->getJsonRawBody();
    //var_dump($registroPago);
   // RegistroPago::updateRegistroPago($id, $registroPago);
    $response = new Response();
  $registroPago=$app->request->getJsonRawBody();
    //var_dump($registroPago);
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
    //var_dump($registroPago);
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
