<?php
use Phalcon\Http\Response;
/*OBTENER TODOS LOS GATEWAY*/
$app->get('/api/gateway', function() use ($app)
{
	$gateways = Gateway::getAll();
	$data = array();
	foreach ($gateways as $gateway)
	{
	  $data[]=array
	  (
		'id' => $gateway->id,
		'id_horario' => $gateway->id_horario,
		'aeropuerto_codigo' => $gateway->aeropuerto_codigo
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

/*OBTENER GATEWAY POR ID*/
$app->get('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	$gateways = Gateway::getById($id);
	$data = array();
	foreach ($gateways as $gateway)
	{
		$data[]=array
		(
			'id' => $gateway->id,
			'id_horario' => $gateway->id_horario,
			'aeropuerto_codigo' => $gateway->aeropuerto_codigo
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

/*CREAR UN NUEVO GATEWAY*/
$app->post('/api/gateway', function() use ($app)
{
    $gateway=$app->request->getJsonRawBody();
    //Gateway::addGateway($gateway);
	
	$response = new Response();
	$gateway=$app->request->getJsonRawBody();
    var_dump($gateway);
    if(Gateway::addGateway($gateway)){
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

/*ACTUALIZAR GATEWAY*/
$app->put('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	$gateway=$app->request->getJsonRawBody();
	var_dump($gateway);
	//Gateway::updateGateway($id, $gateway);
	$response = new Response();
	$gateway=$app->request->getJsonRawBody();
    var_dump($gateway);
    if(Gateway::updateGateway($id, $gateway)){
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

/*ELIMINAR GATEWAY*/
$app->delete('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	//Gateway::deleteGateway($id);
	
	$response = new Response();
	$gateway=$app->request->getJsonRawBody();
    var_dump($gateway);
    if(Gateway::deleteGateway($id)){
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
