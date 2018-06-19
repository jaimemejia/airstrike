<?php

/**
 *Inicio de rutas para PrecioClase
 */

$app->get('/api/precioclase', function() use ($app){

    $precioClases = PrecioClase::getAll();
    $data = array();
    foreach ($precioClases as $precioClase){
      $data[]=array(
        'id' => $precioClase->id,
        'tipo_clase_id' => $precioClase->tipo_clase_id,
        'programacion_vuelo_id' => $precioClase->programacion_vuelo_id,
        'precio' => $precioClase->precio,
        'precio_maleta'=> $precioClase->precio_maleta,
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

$app->get('/api/precioclase/{id:[0-9]+}', function($id) use ($app){

    $precioClases = PrecioClase::getById($id);
    $data = array();
    foreach ($precioClases as $precioClase){
      $data[]=array(
        'id' => $precioClase->id,
        'tipo_clase_id' => $precioClase->tipo_clase_id,
        'programacion_vuelo_id' => $precioClase->programacion_vuelo_id,
        'precio' => $precioClase->precio,
        'precio_maleta'=> $precioClase->precio_maleta,
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

$app->post('/api/precioclase', function() use ($app){
    $precioClase=$app->request->getJsonRawBody();
    $response = new Response();
      if(PrecioClase::addPrecioClase($precioClase)){
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

$app->put('/api/precioclase/{id:[0-9]+}', function($id) use ($app){
    $precioClase=$app->request->getJsonRawBody();
    //var_dump($precioClase);
    $response = new Response();
    if(PrecioClase::updatePrecioClase($id, $precioClase)){
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

$app->delete('/api/precioclase/{id:[0-9]+}', function($id) use ($app){

    $response = new Response();
    if(PrecioClase::deletePrecioClase($id)){
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
 *Fin de rutas para PrecioClase
 */
