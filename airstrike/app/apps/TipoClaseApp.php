<?php
/**
 *Inicio de rutas para TipoClase
 */
use Phalcon\Http\Response;
$app->get('/api/tipoclase', function() use ($app){

    $tipoClases = TipoClase::getAll();
    $data = array();
    foreach ($tipoClases as $tipoClase){
      $data[]=array(
        'id' => $tipoClase->id,
        'nombre' => $tipoClase->nombre,
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

$app->get('/api/tipoclase/{id:[0-9]+}', function($id) use ($app){

    $tipoClases = TipoClase::getById($id);
    $data = array();
    foreach ($tipoClases as $tipoClase){
      $data[]=array(
        'id' => $tipoClase->id,
        'nombre' => $tipoClase->nombre,
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

$app->post('/api/tipoclase', function() use ($app){
    $tipoClase=$app->request->getJsonRawBody();
  //  TipoClase::addTipoClase($tipoClase);
   $response = new Response();
  $tipoClase=$app->request->getJsonRawBody();
    var_dump($tipoClase);
    if( TipoClase::addTipoClase($tipoClase)){
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

$app->put('/api/tipoclase/{id:[0-9]+}', function($id) use ($app){
    $tipoClase=$app->request->getJsonRawBody();
    var_dump($tipoClase);
    //TipoClase::updateTipoClase($id, $tipoClase);
    $response = new Response();
  $tipoClase=$app->request->getJsonRawBody();
    var_dump($tipoClase);
    if(TipoClase::updateTipoClase($id, $tipoClase)){
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

$app->delete('/api/tipoclase/{id:[0-9]+}', function($id) use ($app){

   // TipoClase::deleteTipoClase($id);
  $response = new Response();
  $tipoClase=$app->request->getJsonRawBody();
    var_dump($tipoClase);
    if(TipoClase::deleteTipoClase($id)){
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
