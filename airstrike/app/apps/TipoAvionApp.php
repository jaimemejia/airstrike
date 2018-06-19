<?php
use Phalcon\Http\Response;
/**
 *Inicio de rutas para TipoAvion
 */

$app->get('/api/tipoavion', function() use ($app){

    $tipoAviones = TipoAvion::getAll();
    $data = array();
    foreach ($tipoAviones as $tipoAvion){
      $data[]=array(
        'id' => $tipoAvion->id,
        'nombre' => $tipoAvion->nombre,
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

$app->get('/api/tipoavion/{id:[0-9]+}', function($id) use ($app){

    $tipoAviones = TipoAvion::getById($id);
    $data = array();
    foreach ($tipoAviones as $tipoAvion){
      $data[]=array(
        'id' => $tipoAvion->id,
        'nombre' => $tipoAvion->nombre,
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

$app->post('/api/tipoavion', function() use ($app){
    $tipoAvion=$app->request->getJsonRawBody();
   //TipoAvion::addTipoAvion($tipoAvion);  
    $response = new Response();
  $tipoAvion=$app->request->getJsonRawBody();
    //var_dump($tipoAvion);
    if(TipoAvion::addTipoAvion($tipoAvion)){
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

$app->put('/api/tipoavion/{id:[0-9]+}', function($id) use ($app){
    $tipoAvion=$app->request->getJsonRawBody();
    //var_dump($tipoAvion);
  //  TipoAvion::updateTipoAvion($id, $tipoAvion);
    $response = new Response();
  $tipoAvion=$app->request->getJsonRawBody();
    //var_dump($tipoAvion);
    if( TipoAvion::updateTipoAvion($id, $tipoAvion)){
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

$app->delete('/api/tipoavion/{id:[0-9]+}', function($id) use ($app){

   // TipoAvion::deleteTipoAvion($id);
  $response = new Response();
  $tipoAvion=$app->request->getJsonRawBody();
    //var_dump($tipoAvion);
    if(TipoAvion::deleteTipoAvion($id)){
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
 *Fin de rutas para TipoAvion
 */
