<?php
/**
 *Inicio de rutas para CNatural
 */
use Phalcon\Http\Response;

$app->get('/api/cnatural', function() use ($app){

    $cnaturales = CNatural::getAll();
    $data = array();
    foreach ($cnaturales as $cnatural){
      $data[]=array(
        'id_natural' => $cnatural->id_natural,
        'estado_civil' => $cnatural->estado_civil,
        'genero' => $cnatural->genero,
        'fecha_nacimiento' => $cnatural->fecha_nacimiento,
        'tipo_doc' => $cnatural->tipo_doc,
        'num_doc' => $cnatural->num_doc,
        'id_cliente' => $cnatural->id_cliente
      );
    }
//  echo json_encode($data,JSON_PRETTY_PRINT);
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

$app->get('/api/cnatural/{id:[0-9]+}', function($id) use ($app){

    $cnaturales = CNatural::getById($id);
     $data = array();
    foreach ($cnaturales as $cnatural){
      $data[]=array(
        'id_natural' => $cnatural->id_natural,
        'estado_civil' => $cnatural->estado_civil,
        'genero' => $cnatural->genero,
        'fecha_nacimiento' => $cnatural->fecha_nacimiento,
        'tipo_doc' => $cnatural->tipo_doc,
        'num_doc' => $cnatural->num_doc,
        'id_cliente' => $cnatural->id_cliente
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

$app->post('/api/cnatural', function() use ($app){
    $cnatural=$app->request->getJsonRawBody();
   // CNatural::addCNatural($cnatural);
    $response = new Response();
  $cnatural=$app->request->getJsonRawBody();
    //var_dump($cnatural);
    if(CNatural::addCNatural($cnatural)){
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

$app->put('/api/cnatural/{id:[0-9]+}', function($id) use ($app){
    $cnatural=$app->request->getJsonRawBody();
    //var_dump($cnatural);
  //  CNatural::updateCNatural($id, $cnatural);
    $response = new Response();
  $cnatural=$app->request->getJsonRawBody();
    //var_dump($cnatural);
    if( CNatural::updateCNatural($id, $cnatural)){
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

$app->delete('/api/cnatural/{id:[0-9]+}', function($id) use ($app){

   // CNatural::deleteCNatural($id);

  $response = new Response();
  $cnatural=$app->request->getJsonRawBody();
    //var_dump($cnatural);
    if(CNatural::deleteCNatural($id)){
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
