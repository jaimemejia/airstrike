<?php
use Phalcon\Http\Response;
/*OBTENER TODOS LOS PAISES*/
$app->get('/api/pais', function() use ($app)
{
	$paises = Pais::getAll();
	$data = array();
	foreach ($paises as $pais)
	{
	  $data[]=array
	  (
		'codigo' => $pais->codigo,
		'nombre' => $pais->nombre,
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

/*OBTENER PAIS POR CODIGO*/
$app->get('/api/pais/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$paises = Pais::getByCodigo($codigo);
	$data = array();
	foreach ($paises as $pais)
	{
	  $data[]=array
	  (
		'codigo' => $pais->codigo,
		'nombre' => $pais->nombre,
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

/*CREAR UN NUEVO PAIS*/
$app->post('/api/pais', function() use ($app)
{
    $pais=$app->request->getJsonRawBody();
    //Pais::addPais($pais);
	$response = new Response();
	$pais=$app->request->getJsonRawBody();
    var_dump($pais);
    if(Pais::addPais($pais)){
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

/*ACTUALIZAR PAIS*/
$app->put('/api/pais/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$pais=$app->request->getJsonRawBody();
	var_dump($pais);
	//Pais::updatePais($codigo, $pais);
	$response = new Response();
	$pais=$app->request->getJsonRawBody();
    var_dump($pais);
    if(Pais::updatePais($codigo, $pais)){
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

/*ELIMINAR PAIS*/
$app->delete('/api/pais/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	//Pais::deletePais($codigo);
	$response = new Response();
	$pais=$app->request->getJsonRawBody();
    var_dump($pais);
    if(Pais::deletePais($codigo)){
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
