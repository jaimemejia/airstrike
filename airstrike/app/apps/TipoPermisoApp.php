<?php

use Phalcon\Http\Response;

/*OBTENER TODOS LOS tipo-permiso*/
$app->get('/api/tipopermiso', function() use ($app){

    $tipoPermisos = TipoPermiso::getAll();
    $data = array();
    foreach ($tipoPermisos as $tipoPermiso){
      $data[]=array(
        'id' => $tipoPermiso->id,
        'nombre' => $tipoPermiso->nombre,
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
/*OBTENER tipo-permiso POR CODIGO*/
$app->get('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){

    $tipoPermisos = TipoPermiso::getById($id);
    $data = array();
    foreach ($tipoPermisos as $tipoPermiso){
      $data[]=array(
        'id' => $tipoPermiso->id,
        'nombre' => $tipoPermiso->nombre,
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
/*CREAR UN NUEVO TipoPermiso*/
$app->post('/api/tipopermiso', function() use ($app){
    $tipoPermiso=$app->request->getJsonRawBody();
    //TipoPermiso::addTipoPermiso($tipoPermiso);
    $response = new Response();
	$tipopermiso=$app->request->getJsonRawBody();
    var_dump($tipopermiso);
    if(TipoPermiso::addATipoPermiso($tipopermiso)){
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
/*ACTUALIZAR TipoPermiso*/
$app->put('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){
    $tipoPermiso=$app->request->getJsonRawBody();
    var_dump($tipoPermiso);
    //TipoPermiso::updateTipoPermiso($id, $tipoPermiso);
    $response = new Response();
	$tipopermiso=$app->request->getJsonRawBody();
    var_dump($tipopermiso);
    if(TipoPermiso::updateTipoPermiso($id, $tipopermiso)){
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
 /*ELIMINAR TipoPermiso*/
$app->delete('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){

    //TipoPermiso::deleteTipoPermiso($id);
    $response = new Response();
	$tipopermiso=$app->request->getJsonRawBody();
    var_dump($tipopermiso);
    if(TipoPermiso::deleteTipoPermiso($id)){
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
 *Fin de rutas para TipoPermiso
 */
