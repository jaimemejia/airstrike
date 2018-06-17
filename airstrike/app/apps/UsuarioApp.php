<?php
use Phalcon\Http\Response;

/*OBTENER TODOS LOS USUARIOS*/
$app->get('/api/usuario', function() use ($app){

    $usuarios = Usuario::getAll();
    $data = array();
    foreach ($usuarios as $usuario)
    {
      $data[]=array
      (
        'id_usuario' => $usuario->id_usuario,
        'id_rol' => $usuario->id_rol,
        'id_estado'=> $usuario->id_estado,
        'millas'=> $usuario->milas,
        'username'=> $usuario->username,
        'password'=> $usuario->password,
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
$app->get('/api/usuario/{id:[0-9]+}', function($id) use ($app){
    $usuarios = Usuario::getById($id);
    $data = array();
    foreach ($usuarios as $usuario){
      $data[]=array(
        'id_usuario' => $usuario->id_usuario,
        'id_rol' => $usuario->id_rol,
        'id_estado'=> $usuario->id_estado,
        'millas'=> $usuario->milas,
        'username'=> $usuario->username,
        'password'=> $usuario->password,
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
/*CREAR UN NUEVO USUARIO*/
$app->post('/api/usuario', function() use ($app){
    $usuario=$app->request->getJsonRawBody();
    //Usuario::addUsuario($usuario);
    $response = new Response();
	$usuario=$app->request->getJsonRawBody();
    var_dump($usuario);
    if(usuario::addUsuario($usuario)){
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
/*ACTUALIZAR Usuario*/
$app->put('/api/usuario/{id:[0-9]+}', function($id) use ($app){
    $usuario=$app->request->getJsonRawBody();
    var_dump($usuario);
    //Usuario::updateUsuario($id, $usuario);
    $response = new Response();
	$usuario=$app->request->getJsonRawBody();
    var_dump($usuario);
    if(Usuario::updateUsuario($id, $usuario)){
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
/*ELIMINAR Usuario*/
$app->delete('/api/usuario/{id:[0-9]+}', function($id) use ($app){

    //Usuario::deleteUsuario($id);
    $response = new Response();
	$usuario=$app->request->getJsonRawBody();
    var_dump($usuario);
    if(Usuario::deleteUsuario($id)){
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
 *Fin de rutas para Usuario
 */
