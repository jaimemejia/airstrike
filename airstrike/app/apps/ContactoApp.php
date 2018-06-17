<?php
use Phalcon\Http\Response;
/*OBTENER TODOS LOS CONTACTOS*/
$app->get('/api/contacto', function() use ($app)
{
	$contactos = Contacto::getAll();
	$data = array();
	foreach ($contactos as $contacto)
	{
	  $data[]=array
	  (
		'id' => $contacto->id,
		'direccion_web' => $contacto->direccion_web,
		'nombre' => $contacto->nombre,
		'linea_aerea_codigo' => $contacto->linea_aerea_codigo
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

/*OBTENER CONTACTO POR ID*/
$app->get('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	$contactos = Contacto::getById($id);
	$data = array();
	foreach ($contactos as $contacto)
	{
	  $data[]=array
	  (
		'id' => $contacto->id,
		'direccion_web' => $contacto->direccion_web,
		'nombre' => $contacto->nombre,
		'linea_aerea_codigo' => $contacto->linea_aerea_codigo
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

/*CREAR UN NUEVO CONTACTO*/
$app->post('/api/contacto', function() use ($app)
{
    $contacto=$app->request->getJsonRawBody();
    //Contacto::addContacto($contacto);
	
	$response = new Response();
	$contacto=$app->request->getJsonRawBody();
    var_dump($contacto);
    if(Contacto::addContacto($contacto)){
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

/*ACTUALIZAR CONTACTO*/
$app->put('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	$contacto=$app->request->getJsonRawBody();
	var_dump($contacto);
	//Contacto::updateContacto($id, $contacto);
	
	$response = new Response();
	$contacto=$app->request->getJsonRawBody();
    var_dump($contacto);
    if(Contacto::updateContacto($id, $contacto)){
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

/*ELIMINAR CONTACTO*/
$app->delete('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	//Contacto::deleteContacto($id);
	$response = new Response();
	$contacto=$app->request->getJsonRawBody();
    var_dump($contacto);
    if(Contacto::deleteContacto($id)){
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
