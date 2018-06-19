<?php
use Phalcon\Http\Response;

/*OBTENER TODOS LOS ITINERARIO*/
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
/*OBTENER itinerario POR CODIGO*/
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
 /*CREAR UN NUEVO Itinenario*/
$app->post('/api/itinerario', function() use ($app){
    $itinerario=$app->request->getJsonRawBody();
    //Itinerario::addItinerario($itinerario);
    
	$response = new Response();
	$itinerario=$app->request->getJsonRawBody();
    //var_dump($itinerario);
    if(Itinerario::addItinerario($itinerario)){
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
/*ACTUALIZAR itinerario*/
$app->put('/api/itinerario/{id:[0-9]+}', function($id) use ($app){
    $itinerario=$app->request->getJsonRawBody();
    //var_dump($itinerario);
    //Itinerario::updateItinerario($id, $itinerario);
    $response = new Response();
	$itinerario=$app->request->getJsonRawBody();
    //var_dump($itinerario);
    if(Itinerario::updateItinerario($id, $itinerario)){
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
/*ELIMINAR Itinerario*/
$app->delete('/api/itinerario/{id:[0-9]+}', function($id) use ($app){

    //Itinerario::deleteItinerario($id);
    
	$response = new Response();
	$itinerario=$app->request->getJsonRawBody();
    //var_dump($itinerario);
    if(Itinerario::deleteItinerario($id)){
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
 *Fin de rutas para Itinerario
 */
