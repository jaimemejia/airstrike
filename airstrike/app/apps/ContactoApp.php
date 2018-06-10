<?php

/*OBTENER TODOS LOS CONTACTOS*/
$app->get('/api/contacto', function() use ($app)
{
	$contactos = Contacto::getAll();
	$data = array();
	foreach ($contactos as $contacto)
	{
	  $data[]=array
	  (
		'direccion_web' => $contacto->direccion_web,
		'nombre' => $contacto->nombre,
		'linea_aerea_codigo' => $contacto->linea_aerea_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER CONTACTO POR ID*/
$app->get('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	$contactos = Contacto::getById($id);
	$data = array();
	foreach ($contactos as $contacto)
	{
	  $data[]=array
	  (
		'direccion_web' => $contacto->direccion_web,
		'nombre' => $contacto->nombre,
		'linea_aerea_codigo' => $contacto->linea_aerea_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO CONTACTO*/
$app->post('/api/contacto', function() use ($app)
{
    $contacto=$app->request->getJsonRawBody();
    Contacto::addContacto($contacto);
});

/*ACTUALIZAR CONTACTO*/
$app->put('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	$contacto=$app->request->getJsonRawBody();
	var_dump($contacto);
	Contacto::updateContacto($id, $contacto);
});

/*ELIMINAR CONTACTO*/
$app->delete('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	Contacto::deleteContacto($id);
});
