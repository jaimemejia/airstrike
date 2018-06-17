<?php

use Phalcon\Http\Response;

/*OBTENER TODAS LAS PROGRAMACIONES*/
$app->get('/api/programacion_vuelo', function() use ($app)
{
	$programaciones_vuelos = ProgramacionVuelo::getAll();
	$data = array();
	foreach ($programaciones_vuelos as $programacion_vuelo)
	{
	  $data[]=array
	  (
		'id' => $programacion_vuelo->id,
		'avion_placa' => $programacion_vuelo->avion_placa,
		'gateway_id' => $programacion_vuelo->gateway_id,
		'fecha' => $programacion_vuelo->fecha,
		'vuelo_codigo' => $programacion_vuelo->vuelo_codigo
	  );
	}
	//echo json_encode($data,JSON_PRETTY_PRINT);
	// Create a response
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

/*OBTENER PROGRAMACION POR ID*/
$app->get('/api/programacion_vuelo/{id:[0-9]+}', function($id) use ($app)
{
	$programaciones_vuelos = ProgramacionVuelo::getById($id);
	$data = array();
	foreach ($programaciones_vuelos as $programacion_vuelo)
	{
	  $data[]=array
	  (
		'id' => $programacion_vuelo->id,
		'avion_placa' => $programacion_vuelo->avion_placa,
		'gateway_id' => $programacion_vuelo->gateway_id,
		'fecha' => $programacion_vuelo->fecha,
		'vuelo_codigo' => $programacion_vuelo->vuelo_codigo
	  );
	}
	//echo json_encode($data,JSON_PRETTY_PRINT);
	// Create a response
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

/*CREAR UNA NUEVA PROGRAMACION*/
$app->post('/api/programacion_vuelo', function() use ($app)
{
    $programacion_vuelo=$app->request->getJsonRawBody();
    //ProgramacionVuelo::addProgramacion($programacion_vuelo);
	$response = new Response();
	$programacion_vuelo=$app->request->getJsonRawBody();
    var_dump($programacion_vuelo);
    if(ProgramacionVuelo::addProgramacion($programacion_vuelo)){
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

/*ACTUALIZAR PROGRAMACION*/ 
$app->put('/api/programacion_vuelo/{id:[0-9]+}', function($id) use ($app)
{
	$programacion_vuelo=$app->request->getJsonRawBody();
	var_dump($programacion_vuelo);
	//ProgramacionVuelo::updateProgramacion($id, $programacion_vuelo);
	
	$response = new Response();
	$programacion_vuelo=$app->request->getJsonRawBody();
    var_dump($programacion_vuelo);
    if(ProgramacionVuelo::updateProgramacion($id, $programacion_vuelo)){
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

/*ELIMINAR PROGRAMACION*/
$app->delete('/api/programacion_vuelo/{id:[0-9]+}', function($id) use ($app)
{
	//ProgramacionVuelo::deleteProgramacion($id);
	$response = new Response();
	$programacion_vuelo=$app->request->getJsonRawBody();
    var_dump($programacion_vuelo);
    if(ProgramacionVuelo::deleteProgramacion($id)){
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