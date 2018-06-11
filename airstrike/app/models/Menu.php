<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Menu extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=32, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="menu_superior_id", type="integer", length=32, nullable=true)
     */
    public $menu_superior_id;

    /**
     *
     * @var integer
     * @Column(column="estado", type="integer", length=32, nullable=false)
     */
    public $estado;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=50, nullable=false)
     */
    public $nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("menu");
        $this->hasMany('id', 'Menu', 'menu_superior_id', ['alias' => 'Menu']);
        $this->hasMany('id', 'Permiso', 'menu_id', ['alias' => 'Permiso']);
        $this->belongsTo('menu_superior_id', '\Menu', 'id', ['alias' => 'Menu']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'menu';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Menu[]|Menu|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Menu|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_menu()";
      $menu = new Menu();
      return new Resultset(null, $menu, $menu->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_menu('$id')";
      $menu = new Menu();
      return new Resultset(null, $menu, $menu->getReadConnection()->query($sql));
    }

    public static function addMenu($menu)
    {
      if(empty($menu->menu_superior_id)){
        $sql = "SELECT * FROM create_menu('$menu->nombre','$menu->estado',null)";
      }
      else{
        $sql = "SELECT * FROM create_menu('$menu->nombre','$menu->estado','$menu->menu_superior_id')";
      }
      $menu = new Menu();
      return new Resultset(null, $menu, $menu->getReadConnection()->query($sql));
    }

    public static function updateMenu($id, $menu )
    {
      $sql = "SELECT * FROM update_menu('$menu->id','$menu->nombre','$menu->estado','$menu->menu_superior_id')";
      $menu = new Menu();
      return new Resultset(null, $menu, $menu->getReadConnection()->query($sql));
    }

    public static function deleteMenu($id)
    {
      $sql = "SELECT * FROM delete_menu('$id')";
      $menu = new Menu();
      return new Resultset(null, $menu, $menu->getReadConnection()->query($sql));
    }


}
