<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Avion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="placa", type="string", nullable=false)
     */
    public $placa;

    /**
     *
     * @var integer
     * @Column(column="tipo_avion_id", type="integer", length=32, nullable=false)
     */
    public $tipo_avion_id;

    /**
     *
     * @var integer
     * @Column(column="linea_aerea_codigo", type="integer", nullable=false)
     */
    public $linea_aerea_codigo;

    /**
     *
     * @var integer
     * @Column(column="modelo_avion_id", type="integer", length=32, nullable=false)
     */
    public $modelo_avion_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("avion");
        $this->hasMany('placa', 'ProgramacionVuelo', 'avion_placa', ['alias' => 'ProgramacionVuelo']);
        $this->belongsTo('linea_aerea_codigo', '\LineaAerea', 'codigo', ['alias' => 'LineaAerea']);
        $this->belongsTo('modelo_avion_id', '\ModeloAvion', 'id', ['alias' => 'ModeloAvion']);
        $this->belongsTo('tipo_avion_id', '\TipoAvion', 'id', ['alias' => 'TipoAvion']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'avion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Avion[]|Avion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Avion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_avion()";
      $avion = new Avion();
      return new Resultset(null, $avion, $avion->getReadConnection()->query($sql));
    }

    public static function getById($placa)
      {
        $sql = "SELECT * FROM get_avion('$placa')";
        $avion = new Avion();
        return new Resultset(null, $avion, $avion->getReadConnection()->query($sql));
      }

      public static function addAvion($avion)
      {
        $sql = "SELECT * FROM create_avion('$avion->placa',
         '$avion->tipo_avion_id',
          '$avion->linea_aerea_codigo',
          '$avion->modelo_avion_id')";
          $avion = new Avion();
        return new Resultset(null, $avion, $avion->getReadConnection()->query($sql));
      }

      public static function updateAvion($placa, $avion)
      {
        $sql = "SELECT * FROM update_avion('$placa',
          '$avion->tipo_avion_id',
           '$avion->linea_aerea_codigo',
           '$avion->modelo_avion_id')";
           $avion = new Avion();
         return new Resultset(null, $avion, $avion->getReadConnection()->query($sql));
       }

      public static function deleteAvion($placa)
      {
        $sql = "SELECT * FROM delete_avion('$placa')";
        $avion = new Avion();
        return new Resultset(null, $avion, $avion->getReadConnection()->query($sql));
      }





}
