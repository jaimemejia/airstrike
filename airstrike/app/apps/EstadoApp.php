<?php
use Phalcon\Http\Response;

/*OBTENER TODOS LOS ESTADO*/
$app->get('/api/estado', function() use ($app)
{
    $estados = Estado::getAll();
    $data = array();
    foreach ($estados as $estado){
      $data[]=array(
        'id' => $estado->id,
        'nombre' => $estado->nombre,
      );
    }
 // echo json_encode($data,JSON_PRETTY_PRINT);
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
/*OBTENER ESTADO POR CODIGO*/
$app->get('/api/estado/{id:[0-9]+}', function($id) use ($app){

    $estados = Estado::getById($id);
    $data = array();
    foreach ($estados as $estado){
      $data[]=array(
        'id' => $estado->id,
        'nombre' => $estado->nombre,
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
/*CREAR UN NUEVO Estado*/
$app->post('/api/estado', function() use ($app){
    $estado=$app->request->getJsonRawBody();
    //Estado::addEstado($estado);
    $response = new Response();
	$estado=$app->request->getJsonRawBody();
    var_dump($estado);
    if(Estado::addEstado($estado)){
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
/*ACTUALIZAR ESTADO*/
$app->put('/api/estado/{id:[0-9]+}', function($id) use ($app){
    $estado=$app->request->getJsonRawBody();
    var_dump($estado);
    //Estado::updateEstado($id, $estado);
    $response = new Response();
	$estado=$app->request->getJsonRawBody();
    var_dump($estado);
    if(Estado::updateEstado($id, $Estado)){
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
/*ELIMINAR ESTADO*/
$app->delete('/api/estado/{id:[0-9]+}', function($id) use ($app){

   // Estado::deleteEstado($id);
   $response = new Response();
   $estado=$app->request->getJsonRawBody();
     var_dump($estado);
     if(Estado::deleteEstado($id)){
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
 *Fin de rutas para Estado
 */
