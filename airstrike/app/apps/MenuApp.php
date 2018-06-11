<?php

/**
 *Inicio de rutas para Menu
 */
 $app->get('/api/menu', function() use ($app){

     $menus = Menu::getAll();
     $data = array();
     foreach ($menus as $menu){
       $data[]=array(
         'id' => $menu->id,
         'menu_superior_id' => $menu->menu_superior_id,
         'estado' => $menu->estado,
         'nombre' => $menu->nombre,
       );
     }
   echo json_encode($data,JSON_PRETTY_PRINT);
 });

 $app->get('/api/menu/{id:[0-9]+}', function($id) use ($app){

     $menus = Menu::getById($id);
     $data = array();
     foreach ($menus as $menu){
       $data[]=array(
         'id' => $menu->id,
         'menu_superior_id' => $menu->menu_superior_id,
         'estado' => $menu->estado,
         'nombre' => $menu->nombre,
       );
     }
   echo json_encode($data,JSON_PRETTY_PRINT);
 });

 $app->post('/api/menu', function() use ($app){
     $menu=$app->request->getJsonRawBody();
     Menu::addMenu($menu);
 });

 $app->put('/api/menu/{id:[0-9]+}', function($id) use ($app)
 {
 	  $menu=$app->request->getJsonRawBody();
 	  var_dump($menu);
 	  Menu::updateMenu($id, $menu);
 });

 $app->delete('/api/menu/{id:[0-9]+}', function($id) use ($app){

     Menu::deleteMenu($id);
 });
 /**
  *Fin de rutas para Menu
  */
