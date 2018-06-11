<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class PrecioClase extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="tipo_clase_id", type="integer", length=32, nullable=false)
     */
    public $tipo_clase_id;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="programacion_vuelo_id", type="integer", length=32, nullable=false)
     */
    public $programacion_vuelo_id;

    /**
     *
     * @var double
     * @Column(column="precio", type="double", length=10, nullable=false)
     */
    public $precio;

    /**
     *
     * @var double
     * @Column(column="precio_maleta", type="double", length=10, nullable=false)
     */
    public $precio_maleta;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("precio_clase");
        $this->belongsTo('tipo_clase_id', '\TipoClase', 'id', ['alias' => 'TipoClase']);
        $this->belongsTo('programacion_vuelo_id', '\ProgramacionVuelo', 'id', ['alias' => 'ProgramacionVuelo']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'precio_clase';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PrecioClase[]|PrecioClase|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PrecioClase|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


        public static function getAll()
        {
          $sql = "SELECT * FROM get_precio_clase()";
          $precioClase = new PrecioClase();
          return new Resultset(null, $precioClase, $precioClase->getReadConnection()->query($sql));
        }

        public static function getById($id)
        {
          $sql = "SELECT * FROM get_precio_clase('$id')";
          $precioClase = new PrecioClase();
          return new Resultset(null, $precioClase, $precioClase->getReadConnection()->query($sql));
        }

        public static function addPrecioClase($precioClase)
        {
          $sql = "SELECT * FROM create_precio_clase('$precioClase->id_rol','$precioClase->id_estado','$precioClase->millas','$precioClase->username','$precioClase->password')";
          $precioClase = new PrecioClase();
          return new Resultset(null, $precioClase, $precioClase->getReadConnection()->query($sql));
        }

        public static function updatePrecioClase($id, $precioClase )
        {

          $sql = "SELECT * FROM update_precio_clase('$id','$precioClase->id_rol','$precioClase->id_estado','$precioClase->millas','$precioClase->username','$precioClase->password')";

          $precioClase = new PrecioClase();
          return new Resultset(null, $precioClase, $precioClase->getReadConnection()->query($sql));
        }

        public static function deletePrecioClase($id)
        {
          $sql = "SELECT * FROM delete_precio_clase('$id')";
          $precioClase = new PrecioClase();
          return new Resultset(null, $precioClase, $precioClase->getReadConnection()->query($sql));
        }

}
