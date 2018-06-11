<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class DetalleVuelo extends \Phalcon\Mvc\Model
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
     * @Column(column="tipo_clase_id", type="integer", length=32, nullable=false)
     */
    public $tipo_clase_id;

    /**
     *
     * @var integer
     * @Column(column="itinerario_id", type="integer", length=32, nullable=false)
     */
    public $itinerario_id;

    /**
     *
     * @var integer
     * @Column(column="numero_asiento", type="integer", length=32, nullable=false)
     */
    public $numero_asiento;

    /**
     *
     * @var integer
     * @Column(column="programacion_vuelo_id", type="integer", length=32, nullable=false)
     */
    public $programacion_vuelo_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("detalle_vuelo");
        $this->belongsTo('programacion_vuelo_id', '\ProgramacionVuelo', 'id', ['alias' => 'ProgramacionVuelo']);
        $this->belongsTo('itinerario_id', '\Itinerario', 'id', ['alias' => 'Itinerario']);
        $this->belongsTo('tipo_clase_id', '\TipoClase', 'id', ['alias' => 'TipoClase']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detalle_vuelo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleVuelo[]|DetalleVuelo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleVuelo|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_detalle_vuelo()";
      $detalleVuelo = new DetalleVuelo();
      return new Resultset(null, $detalleVuelo, $detalleVuelo->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_detalle_vuelo('$id')";
      $detalleVuelo = new DetalleVuelo();
      return new Resultset(null, $detalleVuelo, $detalleVuelo->getReadConnection()->query($sql));
    }

    public static function addDetalleVuelo($detalleVuelo)
    {
      $sql = "SELECT * FROM create_detalle_vuelo('$detalleVuelo->tipo_clase_id','$detalleVuelo->itinerario_id','$detalleVuelo->numero_asiento','$detalleVuelo->programacion_vuelo_id')";
      $detalleVuelo = new DetalleVuelo();
      return new Resultset(null, $detalleVuelo, $detalleVuelo->getReadConnection()->query($sql));
    }

    public static function updateDetalleVuelo($id, $detalleVuelo )
    {
      $sql = "SELECT * FROM update_detalle_vuelo('$id','$detalleVuelo->tipo_clase_id','$detalleVuelo->itinerario_id','$detalleVuelo->numero_asiento','$detalleVuelo->programacion_vuelo_id')";
      $detalleVuelo = new DetalleVuelo();
      return new Resultset(null, $detalleVuelo, $detalleVuelo->getReadConnection()->query($sql));
    }

    public static function deleteDetalleVuelo($id)
    {
      $sql = "SELECT * FROM delete_detalle_vuelo('$id')";
      $detalleVuelo = new DetalleVuelo();
      return new Resultset(null, $detalleVuelo, $detalleVuelo->getReadConnection()->query($sql));
    }

}
