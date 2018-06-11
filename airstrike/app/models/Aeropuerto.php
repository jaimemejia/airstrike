<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Aeropuerto extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="codigo", type="string", length=8, nullable=false)
     */
    public $codigo;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=100, nullable=true)
     */
    public $nombre;

    /**
     *
     * @var string
     * @Column(column="telefono", type="string", length=16, nullable=false)
     */
    public $telefono;

    /**
     *
     * @var integer
     * @Column(column="bahias", type="integer", length=32, nullable=false)
     */
    public $bahias;

    /**
     *
     * @var integer
     * @Column(column="ciudad_codigo", type="integer", length=32, nullable=false)
     */
    public $ciudad_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("aeropuerto");
        $this->hasMany('codigo', 'Gateway', 'aeropuerto_codigo', ['alias' => 'Gateway']);
        $this->belongsTo('ciudad_codigo', '\Ciudad', 'codigo', ['alias' => 'Ciudad']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'aeropuerto';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aeropuerto[]|Aeropuerto|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aeropuerto|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

	/*OBTENER TODOS LOS AEROPUERTOS*/
	public static function getAll()
    {
      $sql = "SELECT * FROM select_aeropuerto()";
      $aeropuerto = new Aeropuerto();
      return new Resultset(null, $aeropuerto, $aeropuerto->getReadConnection()->query($sql));
    }
	
	/*OBTENER AEROPUERTO POR CODIGO*/
	public static function getByCodigo($codigo)
    {
      $sql = "SELECT * FROM select_aeropuerto_id('$codigo')";
      $aeropuerto = new Aeropuerto();
      return new Resultset(null, $aeropuerto, $aeropuerto->getReadConnection()->query($sql));
    }
	
	/*CREAR UN NUEVO AEROPUERTO*/
	public static function addAeropuerto($aeropuerto)
    {
      $sql = "SELECT * FROM create_aeropuerto('$aeropuerto->codigo','$aeropuerto->nombre','$aeropuerto->telefono','$aeropuerto->bahias','$aeropuerto->ciudad_codigo')";
      $aeropuerto = new Aeropuerto();
      return new Resultset(null, $aeropuerto, $aeropuerto->getReadConnection()->query($sql));
    }

	/*ACTUALIZAR AEROPUERTO*/ 
	public static function updateAeropuerto($codigo,$aeropuerto)
	{
	  $sql = "SELECT * FROM update_aeropuerto('$codigo','$aeropuerto->nombre','$aeropuerto->telefono','$aeropuerto->bahias','$aeropuerto->ciudad_codigo')";
	  $aeropuerto = new Aeropuerto();
	  return new Resultset(null, $aeropuerto, $aeropuerto->getReadConnection()->query($sql));
	}
	
	/*ELIMINAR AEROPUERTO*/
	public static function deleteAeropuerto($codigo)
    {
      $sql = "SELECT * FROM delete_aeropuerto('$codigo')";
      $aeropuerto = new Aeropuerto();
      return new Resultset(null, $aeropuerto, $aeropuerto->getReadConnection()->query($sql));
    }

}
