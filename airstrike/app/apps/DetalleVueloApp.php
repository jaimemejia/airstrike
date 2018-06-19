<?php
use Phalcon\Http\Response;

/*OBTENER TODOS LOS detallesvuelo*/
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
/*OBTENER detalle vuelo POR CODIGO*/
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
/*CREAR UN NUEVO detalle vuelo*/
$app->post('/api/detallevuelo', function() use ($app){
    $detalleVuelo=$app->request->getJsonRawBody();
    //DetalleVuelo::addDetalleVuelo($detalleVuelo);
    if(DetalleVuelo::addDetalleVuelo($detalleVuelo)){
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
/*ACTUALIZAR detalle vuelo*/
$app->put('/api/detallevuelo/{id:[0-9]+}', function($id) use ($app){
    $detalleVuelo=$app->request->getJsonRawBody();
    //var_dump($detalleVuelo);
    //DetalleVuelo::updateDetalleVuelo($id, $detalleVuelo);
    if(DetalleVuelo::updateDetalleVuelo($id, $detalleVuelo)){
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
 /*ELIMINAR detalle vuelo*/
$app->delete('/api/detallevuelo/{id:[0-9]+}', function($id) use ($app){

    //DetalleVuelo::deleteDetalleVuelo($id);
    $response = new Response();
	$detalleVuelo=$app->request->getJsonRawBody();
	$detalleVuelo=$app->request->getJsonRawBody();
  //var_dump($detalleVuelo);
    if(DetalleVuelo::deleteDetalleVuelo($id)){
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
 *Fin de rutas para DetalleVuelo
 */
