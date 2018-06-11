<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Permiso extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="nombre", type="string", length=50, nullable=false)
     */
    public $nombre;

    /**
     *
     * @var integer
     * @Column(column="estado", type="integer", length=32, nullable=false)
     */
    public $estado;

    /**
     *
     * @var integer
     * @Column(column="menu_id", type="integer", length=32, nullable=false)
     */
    public $menu_id;

    /**
     *
     * @var integer
     * @Column(column="tipo_permiso_id", type="integer", length=32, nullable=false)
     */
    public $tipo_permiso_id;

    /**
     *
     * @var integer
     * @Column(column="rol_tipo", type="integer", length=32, nullable=false)
     */
    public $rol_tipo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("permiso");
        $this->belongsTo('tipo_permiso_id', '\TipoPermiso', 'id', ['alias' => 'TipoPermiso']);
        $this->belongsTo('menu_id', '\Menu', 'id', ['alias' => 'Menu']);
        $this->belongsTo('rol_tipo', '\Rol', 'tipo', ['alias' => 'Rol']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'permiso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permiso[]|Permiso|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permiso|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_permiso()";
      $permiso = new Permiso();
      return new Resultset(null, $permiso, $permiso->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_permiso('$id')";
      $permiso = new Permiso();
      return new Resultset(null, $permiso, $permiso->getReadConnection()->query($sql));
    }

    public static function addPermiso($permiso)
    {
      $sql = "SELECT * FROM create_permiso('$permiso->nombre','$permiso->estado','$permiso->menu_id','$permiso->tipo_permiso','$permiso->rol_tipo')";
      $permiso = new Permiso();
      return new Resultset(null, $permiso, $permiso->getReadConnection()->query($sql));
    }

    public static function updatePermiso($id, $permiso )
    {
      $sql = "SELECT * FROM update_permiso('$id','$permiso->nombre','$permiso->estado','$permiso->menu_id','$permiso->tipo_permiso','$permiso->rol_tipo')";
      $permiso = new Permiso();
      return new Resultset(null, $permiso, $permiso->getReadConnection()->query($sql));
    }

    public static function deletePermiso($id)
    {
      $sql = "SELECT * FROM delete_permiso('$id')";
      $permiso = new Permiso();
      return new Resultset(null, $permiso, $permiso->getReadConnection()->query($sql));
    }

}
