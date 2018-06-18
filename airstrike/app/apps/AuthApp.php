<?php
use Phalcon\Http\Response;

  $app->post('/api/login', function() use ($app){
    // Create a response
    $response = new Response();

    $logged=$app->request->getJsonRawBody();
    $users=Usuario::getByUsernameAndPassword($logged->username,hash('sha512',$logged->password));

    if($users->count()==1){
      foreach ($users as $user){
        $usuario = [
          'id_usuario'=> $user->id_usuario,
          'id_rol'=> $user->id_rol,
          'id_estado'=> $user->id_estado,
          'username'=> $user->username
        ];
        $payload = [
          'sub'   => $user->id_usuario,
          'username' =>  $user->username,
          'iat' => time(),
        ];
      }
      $token = $this->auth->make($payload);

      $response->setJsonContent(array(
        'code' => 0,
        'res' => 'success',
        'token' => $token,
        'usuario'=> $usuario

      ));
      $response->setStatusCode(200,'OK');
    }
    else {
      $response->setJsonContent(array(
        'res' => 'Unauthorized'
      ));
      $response->setStatusCode(401,'Unauthorized');
    }

    $response->setHeader('Access-Control-Allow-Origin', '*');
    $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With'); 
    $response->send();

  });
