<?php
use Phalcon\Http\Response;

/*OBTENER TODOS LOS AEROPUERTOS*/
$app->get('/api/aeropuerto', function() use ($app)
{
	$aeropuertos = Aeropuerto::getAll();
	$data = array();
	foreach ($aeropuertos as $aeropuerto)
	{
	  $data[]=array
	  (
		'codigo' => $aeropuerto->codigo,
		'nombre' => $aeropuerto->nombre,
		'telefono' => $aeropuerto->telefono,
		'bahias' => $aeropuerto->bahias,
		'ciudad_codigo' => $aeropuerto->ciudad_codigo
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

/*OBTENER AEROPUERTO POR CODIGO*/
$app->get('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$aeropuertos = Aeropuerto::getByCodigo($codigo);
	$data = array();
	foreach ($aeropuertos as $aeropuerto)
	{
	  $data[]=array
	  (
		'codigo' => $aeropuerto->codigo,
		'nombre' => $aeropuerto->nombre,
		'telefono' => $aeropuerto->telefono,
		'bahias' => $aeropuerto->bahias,
		'ciudad_codigo' => $aeropuerto->ciudad_codigo
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

 /*CREAR UN NUEVO AEROPUERTO*/
 $app->post('/api/aeropuerto', function() use ($app)
 {
    $aeropuerto=$app->request->getJsonRawBody();
    //Aeropuerto::addAeropuerto($aeropuerto);
	
	$response = new Response();
	$aeropuerto=$app->request->getJsonRawBody();
    if(Aeropuerto::addAeropuerto($aeropuerto)){
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

/*ACTUALIZAR AEROPUERTO*/
$app->put('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$aeropuerto=$app->request->getJsonRawBody();
	//Aeropuerto::updateAeropuerto($codigo, $aeropuerto);
	
	$response = new Response();
	$aeropuerto=$app->request->getJsonRawBody();
    if(Aeropuerto::updateAeropuerto($codigo, $aeropuerto)){
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

 /*ELIMINAR AEROPUERTO*/
$app->delete('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	//Aeropuerto::deleteAeropuerto($codigo);
	
	$response = new Response();
	$aeropuerto=$app->request->getJsonRawBody();
    if(Aeropuerto::deleteAeropuerto($codigo)){
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
