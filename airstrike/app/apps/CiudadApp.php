<?php
/*OBTENER TODAS LAS CIUDADES*/
$app->get('/api/ciudad', function() use ($app)
{
	$ciudades = Ciudad::getAll();
	$data = array();
	foreach ($ciudades as $ciudad)
	{
	  $data[]=array
	  (
		'codigo' => $ciudad->codigo,
		'nombre' => $ciudad->nombre,
		'pais_codigo' => $ciudad->pais_codigo,
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER CIUDAD POR CODIGO*/
$app->get('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$ciudades = Ciudad::getByCodigo($codigo);
	$data = array();
	foreach ($ciudades as $ciudad)
	{
	  $data[]=array
	  (
		'codigo' => $ciudad->codigo,
		'nombre' => $ciudad->nombre,
		'pais_codigo' => $ciudad->pais_codigo,
	  );
	}
    echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UNA NUEVA CIUDAD*/
$app->post('/api/ciudad', function() use ($app)
{
    $ciudad=$app->request->getJsonRawBody();
    Ciudad::addCiudad($ciudad);
});

/*ACTUALIZAR CIUDAD*/
$app->put('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$ciudad=$app->request->getJsonRawBody();
	var_dump($ciudad);
	Ciudad::updateCiudad($codigo, $ciudad);
});

/*ELIMINAR CIUDAD*/
$app->delete('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	Ciudad::deleteCiudad($codigo);
});
