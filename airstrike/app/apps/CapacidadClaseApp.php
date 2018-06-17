<?php
/**
 *Inicio de rutas para capacidadClase
 */
use Phalcon\Http\Response;
$app->get('/api/capacidadclase', function() use ($app){

    $capacidadClases = CapacidadClase::getAll();
    $data = array();
    foreach ($capacidadClases as $capacidadClase){
      $data[]=array(
        'id' => $capacidadClase->id,
        'cantidad' => $capacidadClase->cantidad,
        'id_clases' => $capacidadClase->id_clases,
        'modelo_avion_id' => $capacidadClase->modelo_avion_id,
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

$app->get('/api/capacidadclase/{id:[0-9]+}', function($id) use ($app){

    $capacidadClases = CapacidadClase::getById($id);
    $data = array();
    foreach ($capacidadClases as $capacidadClase){
      $data[]=array(
        'id' => $capacidadClase->id,
        'cantidad' => $capacidadClase->cantidad,
        'id_clases' => $capacidadClase->id_clases,
        'modelo_avion_id' => $capacidadClase->modelo_avion_id,
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

$app->post('/api/capacidadclase', function() use ($app){
    $capacidadClase=$app->request->getJsonRawBody();
    //CapacidadClase::addCapacidadClase($capacidadClase);
    $response = new Response();
  $capacidadClase=$app->request->getJsonRawBody();
    var_dump($capacidadClase);
    if(CapacidadClase::addCapacidadClase($capacidadClase)){
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

$app->put('/api/capacidadclase/{id:[0-9]+}', function($id) use ($app){
    $capacidadClase=$app->request->getJsonRawBody();
    var_dump($capacidadClase);
    //CapacidadClase::updateCapacidadClase($id, $capacidadClase);

    $response = new Response();
  $capacidadClase=$app->request->getJsonRawBody();
    var_dump($capacidadClase);
    if(CapacidadClase::updateCapacidadClase($id, $capacidadClase)
){
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

$app->delete('/api/capacidadclase/{id:[0-9]+}', function($id) use ($app){

   // CapacidadClase::deleteCapacidadClase($id);
$response = new Response();
  $capacidadclase=$app->request->getJsonRawBody();
    var_dump($capacidadclase);
    if(CapacidadClase::deleteCapacidadClase($id)){
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
 *Fin de rutas para CapacidadClase
 */
