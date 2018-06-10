<?php


/*OBTENER TODOS LOS AEROPUERTOS*/
$app->get('/api/aeropuerto', function() use ($app)
{
	$aeropuertos = Aeropuerto::getAll();
	$data = array();
	foreach ($aeropuertos as $aeropuerto)
	{
	  $data[]=array
	  (
		'codigo' => $aeropuerto->codigo,
		'nombre' => $aeropuerto->nombre,
		'telefono' => $aeropuerto->telefono,
		'bahias' => $aeropuerto->bahias,
		'ciudad_codigo' => $aeropuerto->ciudad_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER AEROPUERTO POR CODIGO*/
$app->get('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$aeropuertos = Aeropuerto::getByCodigo($codigo);
	$data = array();
	foreach ($aeropuertos as $aeropuerto)
	{
	  $data[]=array
	  (
		'codigo' => $aeropuerto->codigo,
		'nombre' => $aeropuerto->nombre,
		'telefono' => $aeropuerto->telefono,
		'bahias' => $aeropuerto->bahias,
		'ciudad_codigo' => $aeropuerto->ciudad_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

 /*CREAR UN NUEVO AEROPUERTO*/
 $app->post('/api/aeropuerto', function() use ($app)
 {
    $aeropuerto=$app->request->getJsonRawBody();
    Aeropuerto::addAeropuerto($aeropuerto);
 });

/*ACTUALIZAR AEROPUERTO*/
$app->put('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$aeropuerto=$app->request->getJsonRawBody();
	var_dump($aeropuerto);
	Aeropuerto::updateAeropuerto($codigo, $aeropuerto);
});

 /*ELIMINAR AEROPUERTO*/
$app->delete('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	Aeropuerto::deleteAeropuerto($codigo);
});
