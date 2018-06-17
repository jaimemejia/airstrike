<?php
use Phalcon\Http\Response;
/*OBTENER TODOS LOS VUELOS*/
$app->get('/api/vuelo', function() use ($app)
{
	$vuelos = Vuelo::getAll();
	$data = array();
	foreach ($vuelos as $vuelo)
	{
	  $data[]=array
	  (
		'codigo' => $vuelo->codigo,
		'millas_reales' => $vuelo->millas_reales,
		'millas_otorgadas' => $vuelo->millas_otorgadas,
		'origen' => $vuelo->origen,
		'destino' => $vuelo->destino,
		'linea_aerea_codigo' => $vuelo->linea_aerea_codigo
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

/*OBTENER VUELO POR CODIGO*/
$app->get('/api/vuelo/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$vuelos = Vuelo::getByCodigo($codigo);
	$data = array();
	foreach ($vuelos as $vuelo)
	{
	  $data[]=array
	  (
		'codigo' => $vuelo->codigo,
		'millas_reales' => $vuelo->millas_reales,
		'millas_otorgadas' => $vuelo->millas_otorgadas,
		'origen' => $vuelo->origen,
		'destino' => $vuelo->destino,
		'linea_aerea_codigo' => $vuelo->linea_aerea_codigo
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

/*CREAR UN NUEVO VUELO*/
$app->post('/api/vuelo', function() use ($app)
{
    $vuelo=$app->request->getJsonRawBody();
    //Vuelo::addVuelo($vuelo);
	
	$response = new Response();
	$vuelo=$app->request->getJsonRawBody();
    var_dump($vuelo);
    if(Vuelo::addVuelo($vuelo)){
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

/*ACTUALIZAR VUELO*/
$app->put('/api/vuelo/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$vuelo=$app->request->getJsonRawBody();
	var_dump($vuelo);
	//Vuelo::updateVuelo($codigo, $vuelo);
	
	$response = new Response();
	$vuelo=$app->request->getJsonRawBody();
    var_dump($vuelo);
    if(Vuelo::updateVuelo($codigo, $vuelo)){
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

/*ELIMINAR VUELO*/
$app->delete('/api/vuelo/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	//Vuelo::deleteVuelo($codigo);
	
	$response = new Response();
	$vuelo=$app->request->getJsonRawBody();
    var_dump($vuelo);
    if(Vuelo::deleteVuelo($codigo)){
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