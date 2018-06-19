<?php
/**
 *Inicio de rutas para Avion
 */
use Phalcon\Http\Response;
$app->get('/api/avion', function() use ($app){

    $aviones = Avion::getAll();
    $data = array();
    foreach ($aviones as $avion){
      $data[]=array(
        'placa' => $avion->placa,
        'tipo_avion_id' => $avion->tipo_avion_id,
        'linea_aerea_codigo'=> $avion->linea_aerea_codigo,
        'modelo_avion_id'=> $avion->modelo_avion_id,
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

$app->get('/api/avion/{placa:[a-zA-Z]+}', function($placa) use ($app){

    $aviones = Avion::getById($placa);
    $data = array();
    foreach ($aviones as $avion){
      $data[]=array(
        'placa' => $avion->placa,
        'tipo_avion_id' => $avion->tipo_avion_id,
        'linea_aerea_codigo'=> $avion->linea_aerea_codigo,
        'modelo_avion_id'=> $avion->modelo_avion_id,
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

$app->post('/api/avion', function() use ($app){
    $avion=$app->request->getJsonRawBody();
   // Avion::addAvion($avion);
$response = new Response();
  $avion=$app->request->getJsonRawBody();
    if(Avion::addAvion($avion)){
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

$app->put('/api/avion/{placa:[a-zA-Z]+}', function($placa) use ($app){
    $avion=$app->request->getJsonRawBody();
    //Avion::updateAvion($placa, $avion);

    $response = new Response();
  $aeropuerto=$app->request->getJsonRawBody();
    if(Avion::updateAvion($placa, $avion)){
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

$app->delete('/api/avion/{placa:[a-zA-Z]+}', function($placa) use ($app){

  //  Avion::deleteAvion($placa);


  $response = new Response();
  $avion=$app->request->getJsonRawBody();
    if(Avion::deleteAvion($placa)){
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
 *Fin de rutas para Avion
 */
