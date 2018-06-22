<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class LineaAerea extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="codigo", type="integer", nullable=false)
     */
    public $codigo;

    /**
     *
     * @var string
     * @Column(column="nombre_oficial", type="string", nullable=false)
     */
    public $nombre_oficial;

    /**
     *
     * @var string
     * @Column(column="nombre_corto", type="string", nullable=false)
     */
    public $nombre_corto;

    /**
     *
     * @var string
     * @Column(column="representante", type="string", nullable=false)
     */
    public $representante;

    /**
     *
     * @var string
     * @Column(column="fecha_fundacion", type="string", nullable=false)
     */
    public $fecha_fundacion;

    /**
     *
     * @var string
     * @Column(column="pais_codigo", type="string", nullable=false)
     */
    public $pais_codigo;

    /**
     *
     * @var integer
     * @Column(column="correo_electronico", type="integer", length=32, nullable=false)
     */
    public $correo_electronico;

    /**
     *
     * @var integer
     * @Column(column="pagina_web", type="integer", length=32, nullable=false)
     */
    public $pagina_web;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("linea_aerea");
        $this->hasMany('codigo', 'Avion', 'linea_aerea_codigo', ['alias' => 'Avion']);
        $this->hasMany('codigo', 'Contacto', 'linea_aerea_codigo', ['alias' => 'Contacto']);
        $this->hasMany('codigo', 'Vuelo', 'linea_aerea_codigo', ['alias' => 'Vuelo']);
        $this->belongsTo('pais_codigo', '\Pais', 'codigo', ['alias' => 'Pais']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'linea_aerea';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LineaAerea[]|LineaAerea|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LineaAerea|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

	/*OBTENER TODAS LAS LINEAS AEREAS*/
	public static function getAll()
    {
      $sql = "SELECT * FROM get_linea_aerea()";
      $lineaAerea = new LineaAerea();
      return new Resultset(null, $lineaAerea, $lineaAerea->getReadConnection()->query($sql));
    }

	/*OBTENER LINEA AEREA POR CODIGO*/
	public static function getByCodigo($codigo)
    {
      $sql = "SELECT * FROM get_linea_aerea('$codigo')";
      $lineaAerea = new LineaAerea();
      return new Resultset(null, $lineaAerea, $lineaAerea->getReadConnection()->query($sql));
    }

	/*CREAR UNA NUEVA LINEA AEREA*/
	public static function addLineaAerea($lineaAerea)
    {
      $sql = "SELECT * FROM create_linea_aerea('$lineaAerea->nombre_oficial','$lineaAerea->nombre_corto','$lineaAerea->representante','$lineaAerea->fecha_fundacion','$lineaAerea->pais_codigo','$lineaAerea->correo_electronico','$lineaAerea->pagina_web')";
      $lineaAerea = new LineaAerea();
      return new Resultset(null, $lineaAerea, $lineaAerea->getReadConnection()->query($sql));
    }

	/*ACTUALIZAR LINEA AEREA*/
	public static function updateLineaAerea($codigo,$lineaAerea)
	{
	  $sql = "SELECT * FROM update_linea_aerea('$codigo','$lineaAerea->nombre_oficial','$lineaAerea->nombre_corto','$lineaAerea->representante','$lineaAerea->fecha_fundacion','$lineaAerea->pais_codigo','$lineaAerea->correo_electronico','$lineaAerea->pagina_web')";
	  $lineaAerea = new LineaAerea();
	  return new Resultset(null, $lineaAerea, $lineaAerea->getReadConnection()->query($sql));
	}

	/*ELIMINAR LINEA AEREA*/
	public static function deleteLineaAerea($codigo)
    {
      $sql = "SELECT * FROM delete_linea_aerea('$codigo')";
      $lineaAerea = new LineaAerea();
      return new Resultset(null, $lineaAerea, $lineaAerea->getReadConnection()->query($sql));
    }

    public static function getVuelos($codigo)
      {
        $sql = "SELECT * FROM consulta_vuelos_disp('$codigo')";
        $lineaAerea = new LineaAerea();
        return new Resultset(null, $lineaAerea, $lineaAerea->getReadConnection()->query($sql));
      }

}
