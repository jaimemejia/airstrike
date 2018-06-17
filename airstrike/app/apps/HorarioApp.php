<?php
use Phalcon\Http\Response;
/*OBTENER TODOS LOS HORARIOS*/
$app->get('/api/horario', function() use ($app)
{
	$horarios = Horario::getAll();
	$data = array();
	foreach ($horarios as $horario)
	{
	  $data[]=array
	  (
		'id' => $horario->id,
		'hora' => $horario->hora,
		'tiempo_abordaje' => $horario->tiempo_abordaje,
		'tiempo_desabordaje' => $horario->tiempo_desabordaje
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

/*OBTENER HORARIO POR ID*/
$app->get('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	$horarios = Horario::getById($id);
	$data = array();
	foreach ($horarios as $horario)
	{
	  $data[]=array
	  (
		'id' => $horario->id,
		'hora' => $horario->hora,
		'tiempo_abordaje' => $horario->tiempo_abordaje,
		'tiempo_desabordaje' => $horario->tiempo_desabordaje
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

/*CREAR UN NUEVO HORARIO*/
$app->post('/api/horario', function() use ($app)
{
    $horario=$app->request->getJsonRawBody();
    //Horario::addHorario($horario);
	
	$response = new Response();
	$horario=$app->request->getJsonRawBody();
    var_dump($horario);
    if(Horario::addHorario($horario)){
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

/*ACTUALIZAR HORARIO*/
$app->put('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	$horario=$app->request->getJsonRawBody();
	var_dump($horario);
	//Horario::updateHorario($id, $horario);
	
	$response = new Response();
	$horario=$app->request->getJsonRawBody();
    var_dump($horario);
    if(Horario::updateHorario($id, $horario)){
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

/*ELIMINAR HORARIO*/
$app->delete('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	//Horario::deleteHorario($id);
	$response = new Response();
	$horario=$app->request->getJsonRawBody();
    var_dump($horario);
    if(Horario::deleteHorario($id)){
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
