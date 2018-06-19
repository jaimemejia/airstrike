<?php
use Phalcon\Http\Response;
/*OBTENER TODOS LAS LINEAS AEREAS*/
$app->get('/api/lineaaerea', function() use ($app)
	{
	$lineasaereas = LineaAerea::getAll();
	$data = array();
	foreach ($lineasaereas as $lineaaerea)
	{
	  $data[]=array
	  (
		'codigo' => $lineaaerea->codigo,
		'nombre_oficial' => $lineaaerea->nombre_oficial,
		'nombre_corto' => $lineaaerea->nombre_corto,
		'representante' => $lineaaerea->representante,
		'fecha_fundacion' => $lineaaerea->codigo,
		'pais_codigo' => $lineaaerea->fecha_fundacion,
		'correo_electronico' => $lineaaerea->correo_electronico,
		'pagina_web' => $lineaaerea->pagina_web
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

/*OBTENER LINEA AEREA POR CODIGO*/
$app->get('/api/lineaaerea/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$lineasaereas = LineaAerea::getByCodigo($codigo);
	$data = array();
	foreach ($lineasaereas as $lineaaerea)
	{
	  $data[]=array
	  (
		'codigo' => $lineaaerea->codigo,
		'nombre_oficial' => $lineaaerea->nombre_oficial,
		'nombre_corto' => $lineaaerea->nombre_corto,
		'representante' => $lineaaerea->representante,
		'fecha_fundacion' => $lineaaerea->codigo,
		'pais_codigo' => $lineaaerea->fecha_fundacion,
		'correo_electronico' => $lineaaerea->correo_electronico,
		'pagina_web' => $lineaaerea->pagina_web
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

/*CREAR UNA NUEVA LINEA AEREA*/
$app->post('/api/lineaaerea', function() use ($app)
{
    $lineaaerea=$app->request->getJsonRawBody();
    //LineaAerea::addLineaAerea($lineaaerea);
	$response = new Response();
	$lineaaerea=$app->request->getJsonRawBody();
    //var_dump($lineaaerea);
    if(LineaAerea::addLineaAerea($lineaaerea)){
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

/*ACTUALIZAR LINEA AEREA*/
$app->put('/api/lineaaerea/{codigo:[0-9]+}', function($codigo) use ($app)
{
 $lineaaerea=$app->request->getJsonRawBody();
 //var_dump($lineaaerea);
 //LineaAerea::updateLineaAerea($codigo, $lineaaerea);
 
 $response = new Response();
	$lineaaerea=$app->request->getJsonRawBody();
    //var_dump($lineaaerea);
    if(LineaAerea::updateLineaAerea($codigo, $lineaaerea)){
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

/*ELIMINAR LINEA AEREA*/
$app->delete('/api/lineaaerea/{codigo:[0-9]+}', function($codigo) use ($app)
{
	//LineaAerea::deleteLineaAerea($codigo);
	
	$response = new Response();
	$lineaaerea=$app->request->getJsonRawBody();
    //var_dump($lineaaerea);
    if(LineaAerea::deleteLineaAerea($codigo)){
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
