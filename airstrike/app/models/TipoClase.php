<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class TipoClase extends \Phalcon\Mvc\Model
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
     * @Column(column="nombre", type="string", nullable=false)
     */
    public $nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("tipo_clase");
        $this->hasMany('id', 'CapacidadClase', 'id_clases', ['alias' => 'CapacidadClase']);
        $this->hasMany('id', 'DetalleVuelo', 'tipo_clase_id', ['alias' => 'DetalleVuelo']);
        $this->hasMany('id', 'PrecioClase', 'tipo_clase_id', ['alias' => 'PrecioClase']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_clase';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoClase[]|TipoClase|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoClase|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_tipo_clase()";
      $tipoClase = new TipoClase();
      return new Resultset(null, $tipoClase, $tipoClase->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_tipo_clase('$id')";
      $tipoClase = new TipoClase();
      return new Resultset(null, $tipoClase, $tipoClase->getReadConnection()->query($sql));
    }

    public static function addTipoClase($tipoClase)
    {
      $sql = "SELECT * FROM create_tipo_clase('$tipoClase->nombre')";
      $tipoClase = new TipoClase();
      return new Resultset(null, $tipoClase, $tipoClase->getReadConnection()->query($sql));
    }

    public static function updateTipoClase($id, $tipoClase )
    {
      $sql = "SELECT * FROM update_tipo_clase('$id','$tipoClase->nombre')";
      $tipoClase = new TipoPermiso();
      return new Resultset(null, $tipoClase, $tipoClase->getReadConnection()->query($sql));
    }

    public static function deleteTipoClase($id)
    {
      $sql = "SELECT * FROM delete_tipo_clase('$id')";
      $tipoClase = new TipoClase();
      return new Resultset(null, $tipoClase, $tipoClase->getReadConnection()->query($sql));
    }






}
