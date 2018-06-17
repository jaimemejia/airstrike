<?php
use Phalcon\Http\Response;
/*OBTENER TODAS LAS CIUDADES*/
$app->get('/api/ciudad', function() use ($app)
{
	$ciudades = Ciudad::getAll();
	$data = array();
	foreach ($ciudades as $ciudad)
	{
	  $data[]=array
	  (
		'codigo' => $ciudad->codigo,
		'nombre' => $ciudad->nombre,
		'pais_codigo' => $ciudad->pais_codigo,
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

/*OBTENER CIUDAD POR CODIGO*/
$app->get('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$ciudades = Ciudad::getByCodigo($codigo);
	$data = array();
	foreach ($ciudades as $ciudad)
	{
	  $data[]=array
	  (
		'codigo' => $ciudad->codigo,
		'nombre' => $ciudad->nombre,
		'pais_codigo' => $ciudad->pais_codigo,
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

/*CREAR UNA NUEVA CIUDAD*/
$app->post('/api/ciudad', function() use ($app)
{
    $ciudad=$app->request->getJsonRawBody();
    //Ciudad::addCiudad($ciudad);
	
	$response = new Response();
	$ciudad=$app->request->getJsonRawBody();
    var_dump($ciudad);
    if(Ciudad::addCiudad($ciudad)){
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

/*ACTUALIZAR CIUDAD*/
$app->put('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$ciudad=$app->request->getJsonRawBody();
	var_dump($ciudad);
	//Ciudad::updateCiudad($codigo, $ciudad);
	
	$response = new Response();
	$ciudad=$app->request->getJsonRawBody();
    var_dump($ciudad);
    if(Ciudad::updateCiudad($codigo, $ciudad)){
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

/*ELIMINAR CIUDAD*/
$app->delete('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	//Ciudad::deleteCiudad($codigo);
	
	$response = new Response();
	$ciudad=$app->request->getJsonRawBody();
    var_dump($ciudad);
    if(Ciudad::deleteCiudad($codigo)){
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
