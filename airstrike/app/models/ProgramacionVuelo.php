<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
class ProgramacionVuelo extends \Phalcon\Mvc\Model
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
     * @Column(column="avion_placa", type="string", nullable=false)
     */
    public $avion_placa;

    /**
     *
     * @var integer
     * @Column(column="gateway_id", type="integer", nullable=false)
     */
    public $gateway_id;

    /**
     *
     * @var integer
     * @Column(column="fecha", type="integer", length=32, nullable=false)
     */
    public $fecha;

    /**
     *
     * @var string
     * @Column(column="vuelo_codigo", type="string", nullable=false)
     */
    public $vuelo_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("programacion_vuelo");
        $this->hasMany('id', 'DetalleVuelo', 'programacion_vuelo_id', ['alias' => 'DetalleVuelo']);
        $this->hasMany('id', 'PrecioClase', 'programacion_vuelo_id', ['alias' => 'PrecioClase']);
        $this->belongsTo('gateway_id', '\Gateway', 'id', ['alias' => 'Gateway']);
        $this->belongsTo('avion_placa', '\Avion', 'placa', ['alias' => 'Avion']);
        $this->belongsTo('vuelo_codigo', '\Vuelo', 'codigo', ['alias' => 'Vuelo']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'programacion_vuelo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProgramacionVuelo[]|ProgramacionVuelo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProgramacionVuelo|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
	
	
	/*OBTENER TODAS LAS PROGRAMACIONES*/
	public static function getAll()
    {
      $sql = "SELECT * FROM get_programacion_vuelo()";
      $programacion_vuelo = new ProgramacionVuelo();
      return new Resultset(null, $programacion_vuelo, $programacion_vuelo->getReadConnection()->query($sql));
    }
	
	/*OBTENER PROGRAMACION POR ID*/
	public static function getById($id)
    {
      $sql = "SELECT * FROM get_programacion_vuelo('$id')";
      $programacion_vuelo = new ProgramacionVuelo();
      return new Resultset(null, $programacion_vuelo, $programacion_vuelo->getReadConnection()->query($sql));
    }
	
	/*CREAR UNA NUEVA PROGRAMACION*/
	public static function addProgramacion($programacion_vuelo)
    {
      $sql = "SELECT * FROM create_programacion_vuelo('$programacion_vuelo->avion_placa','$programacion_vuelo->gateway_id','$programacion_vuelo->fecha','$programacion_vuelo->vuelo_codigo')";
      $programacion_vuelo = new ProgramacionVuelo();
      return new Resultset(null, $programacion_vuelo, $programacion_vuelo->getReadConnection()->query($sql));
    }

	/*ACTUALIZAR PROGRAMACION*/ 
	public static function updateProgramacion($id,$programacion_vuelo)
	{
	  $sql = "SELECT * FROM update_programacion_vuelo('$id','$programacion_vuelo->avion_placa','$programacion_vuelo->gateway_id','$programacion_vuelo->fecha','$programacion_vuelo->vuelo_codigo')";
	  $programacion_vuelo = new ProgramacionVuelo();
	  return new Resultset(null, $programacion_vuelo, $programacion_vuelo->getReadConnection()->query($sql));
	}
	
	/*ELIMINAR PROGRAMACION*/
	public static function deleteProgramacion($id)
    {
      $sql = "SELECT * FROM delete_programacion_vuelo('$id')";
      $programacion_vuelo = new ProgramacionVuelo();
      return new Resultset(null, $programacion_vuelo, $programacion_vuelo->getReadConnection()->query($sql));
    }

}
