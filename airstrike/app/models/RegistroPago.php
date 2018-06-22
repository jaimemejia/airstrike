<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
class RegistroPago extends \Phalcon\Mvc\Model
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
     * @Column(column="precio", type="integer", length=32, nullable=false)
     */
    public $precio;

    /**
     *
     * @var integer
     * @Column(column="fecha", type="integer", length=32, nullable=false)
     */
    public $fecha;

    /**
     *
     * @var string
     * @Identity
     * @Column(column="reservacion_id", type="string", nullable=false)
     */
    public $reservacion_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("registro_pago");
        $this->belongsTo('reservacion_id', '\Reservacion', 'id', ['alias' => 'Reservacion']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'registro_pago';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RegistroPago[]|RegistroPago|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RegistroPago|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


       public static function getAll()
        {
          $sql = "SELECT * FROM get_registro_pago()";
          $registroPago = new RegistroPago();
          return new Resultset(null, $registroPago, $registroPago->getReadConnection()->query($sql));
        }

      public static function getById($id)
        {
          $sql = "SELECT * FROM get_registro_pago('$id')";
          $registroPago = new RegistroPago();
          return new Resultset(null, $registroPago, $registroPago->getReadConnection()->query($sql));
        }

        public static function addRegistroPago($registroPago)
        {
          $sql = "SELECT * FROM create_registro_pago(
            '$registroPago->precio',
            '$registroPago->reservacion_id')";
            $registroPago = new RegistroPago();
          return new Resultset(null, $registroPago, $registroPago->getReadConnection()->query($sql));
        }

        public static function updateRegistroPago($id, $registroPago )
        {
          $sql = "SELECT * FROM update_registro_pago(
            '$id',
            '$registroPago->precio',
            '$registroPago->fecha',
            '$registroPago->reservacion_id')";
          $registroPago = new RegistroPago();
          return new Resultset(null, $registroPago, $registroPago->getReadConnection()->query($sql));
        }

        public static function deleteRegistroPago($id)
        {
          $sql = "SELECT * FROM delete_registro_pago('$id')";
          $registroPago = new registroPago();
          return new Resultset(null, $registroPago, $registroPago->getReadConnection()->query($sql));
        }
}
