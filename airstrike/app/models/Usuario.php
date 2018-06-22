<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Usuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_usuario", type="integer", nullable=false)
     */
    public $id_usuario;

    /**
     *
     * @var integer
     * @Column(column="id_rol", type="integer", length=32, nullable=false)
     */
    public $id_rol;

    /**
     *
     * @var integer
     * @Column(column="id_estado", type="integer", length=32, nullable=false)
     */
    public $id_estado;

    /**
     *
     * @var integer
     * @Column(column="millas", type="integer", length=32, nullable=false)
     */
    public $millas;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("usuario");
        $this->hasMany('id_usuario', 'Cliente', 'id_usuario', ['alias' => 'Cliente']);
        $this->belongsTo('id_rol', '\Rol', 'tipo', ['alias' => 'Rol']);
        $this->belongsTo('id_estado', '\Estado', 'id', ['alias' => 'Estado']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]|Usuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_usuario()";
      $usuario = new Usuario();
      return new Resultset(null, $usuario, $usuario->getReadConnection()->query($sql));
    }

    public static function getById($id_usuario)
    {
      $sql = "SELECT * FROM get_usuario('$id_usuario')";
      $usuario = new Usuario();
      return new Resultset(null, $usuario, $usuario->getReadConnection()->query($sql));
    }

    public static function getByUsernameAndPassword($username,$password)
    {

      $sql = "SELECT * FROM get_usuario('$username','$password')";
      $usuario = new Usuario();
      return new Resultset(null, $usuario, $usuario->getReadConnection()->query($sql));
    }

    public static function addUsuario($usuario)
    {
      $sql = "SELECT * FROM create_usuario($usuario->id_rol,$usuario->id_estado,$usuario->millas,'$usuario->username','$usuario->password')";
      $usuario = new Usuario();
      return new Resultset(null, $usuario, $usuario->getReadConnection()->query($sql));
    }

    public static function updateUsuario($id_usuario, $usuario )
    {

      $sql = "SELECT * FROM update_usuario('$id_usuario','$usuario->id_rol','$usuario->id_estado','$usuario->millas','$usuario->username','$usuario->password')";

      $usuario = new Usuario();
      return new Resultset(null, $usuario, $usuario->getReadConnection()->query($sql));
    }

    public static function deleteUsuario($id_usuario)
    {
      $sql = "SELECT * FROM delete_usuario('$id_usuario')";
      $usuario = new Usuario();
      return new Resultset(null, $usuario, $usuario->getReadConnection()->query($sql));
    }

    public static function getPermisos($id_usuario)
    {
      $sql = "SELECT * FROM get_permisos_usuario('$id_usuario')";
      $usuario = new Usuario();
      return new Resultset(null, $usuario, $usuario->getReadConnection()->query($sql));
    }

}
