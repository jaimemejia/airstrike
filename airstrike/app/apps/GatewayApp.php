<?php

/*OBTENER TODOS LOS GATEWAY*/
$app->get('/api/gateway', function() use ($app)
{
	$gateways = Gateway::getAll();
	$data = array();
	foreach ($gateways as $gateway)
	{
	  $data[]=array
	  (
		'id' => $gateway->id,
		'id_horario' => $gateway->id_horario,
		'aeropuerto_codigo' => $gateway->aeropuerto_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER GATEWAY POR ID*/
$app->get('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	$gateways = Gateway::getById($id);
	$data = array();
	foreach ($gateways as $gateway)
	{
		$data[]=array
		(
			'id' => $gateway->id,
			'id_horario' => $gateway->id_horario,
			'aeropuerto_codigo' => $gateway->aeropuerto_codigo
		);
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO GATEWAY*/
$app->post('/api/gateway', function() use ($app)
{
    $gateway=$app->request->getJsonRawBody();
    Gateway::addGateway($gateway);
});

/*ACTUALIZAR GATEWAY*/
$app->put('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	$gateway=$app->request->getJsonRawBody();
	var_dump($gateway);
	Gateway::updateGateway($id, $gateway);
});

/*ELIMINAR GATEWAY*/
$app->delete('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	Gateway::deleteGateway($id);
});
