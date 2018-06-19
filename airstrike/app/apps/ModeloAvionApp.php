<?php
use Phalcon\Http\Response;
/**
 *Inicio de rutas para ModeloAvion
 */

$app->get('/api/modeloavion', function() use ($app){

    $modeloAviones = ModeloAvion::getAll();
    $data = array();
    foreach ($modeloAviones as $modeloAvion){
      $data[]=array(
        'id' => $modeloAvion->id,
        'nombre_modelo' => $modeloAvion->nombre_modelo,
        'marca' => $modeloAvion->marca,
        'cantidad_maleta' => $modeloAvion->cantidad_maleta,
        'cantidad_asientos' => $modeloAvion->cantidad_asientos,
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

$app->get('/api/modeloavion/{id:[0-9]+}', function($id) use ($app){

    $modeloAviones = ModeloAvion::getById($id);
    $data = array();
    foreach ($modeloAviones as $modeloAvion){
      $data[]=array(
        'id' => $modeloAvion->id,
        'nombre_modelo' => $modeloAvion->nombre_modelo,
        'marca' => $modeloAvion->marca,
        'cantidad_maleta' => $modeloAvion->cantidad_maleta,
        'cantidad_asientos' => $modeloAvion->cantidad_asientos,
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

$app->post('/api/modeloavion', function() use ($app){
    $modeloAvion=$app->request->getJsonRawBody();
   // ModeloAvion::addModeloAvion($modeloAvion);
    $response = new Response();
    $modeloAvion=$app->request->getJsonRawBody();
    //var_dump($modeloAvion);
    if(ModeloAvion::addModeloAvion($modeloAvion)){
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

$app->put('/api/modeloavion/{id:[0-9]+}', function($id) use ($app){
    $modeloAvion=$app->request->getJsonRawBody();
    //var_dump($modeloAvion);
   // ModeloAvion::updateModeloAvion($id, $modeloAvion);

    $response = new Response();
    $modeloAvion=$app->request->getJsonRawBody();
    //var_dump($modeloAvion);
    if(ModeloAvion::updateModeloAvion($id, $modeloAvion)){
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

$app->delete('/api/modeloavion/{id:[0-9]+}', function($id) use ($app){

   // ModeloAvion::deleteModeloAvion($id);
    $response = new Response();
    $modeloAvion=$app->request->getJsonRawBody();
    //var_dump($modeloAvion);
    if(ModeloAvion::deleteModeloAvion($id)){
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
 *Fin de rutas para ModeloAvion
 */
