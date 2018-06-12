<?php

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
	 echo json_encode($data,JSON_PRETTY_PRINT);
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
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO HORARIO*/
$app->post('/api/horario', function() use ($app)
{
    $horario=$app->request->getJsonRawBody();
    Horario::addHorario($horario);
});

/*ACTUALIZAR HORARIO*/
$app->put('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	$horario=$app->request->getJsonRawBody();
	var_dump($horario);
	Horario::updateHorario($id, $horario);
});

/*ELIMINAR HORARIO*/
$app->delete('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	Horario::deleteHorario($id);
});
