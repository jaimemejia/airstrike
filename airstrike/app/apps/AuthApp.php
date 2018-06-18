<?php
use Phalcon\Http\Response;

  $app->post('/api/login', function() use ($app){
    // Create a response
    $response = new Response();

    $logged=$app->request->getJsonRawBody();
    var_dump($app->request->get());
    $users=Usuario::getByUsernameAndPassword($logged->username,hash('sha512',$logged->password));
    if($users->count()==1){
      foreach ($users as $user){
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
      ));
      $response->setStatusCode(200,'OK');
    }
    else {
      $response->setJsonContent(array(
        'res' => 'not found'
      ));
      $response->setStatusCode(404,'NOT FOUND');
    }

    $response->send();

  });
