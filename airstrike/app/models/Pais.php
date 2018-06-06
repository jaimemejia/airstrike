<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Pais extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="codigo", type="string", nullable=false)
     */
    public $codigo;

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
        $this->setSource("pais");
        $this->hasMany('codigo', 'Ciudad', 'pais_codigo', ['alias' => 'Ciudad']);
        $this->hasMany('codigo', 'LineaAerea', 'pais_codigo', ['alias' => 'LineaAerea']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pais';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pais[]|Pais|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pais|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

	/*OBTENER TODOS LOS PAISES*/
	public static function getAll()
    {
      $sql = "SELECT * FROM select_pais()";
      $pais = new Pais();
      return new Resultset(null, $pais, $pais->getReadConnection()->query($sql));
    }
	
	/*OBTENER PAIS POR CODIGO*/
	public static function getByCodigo($codigo)
    {
      $sql = "SELECT * FROM select_pais_id('$codigo')";
      $pais = new Pais();
      return new Resultset(null, $pais, $pais->getReadConnection()->query($sql));
    }
	
	/*CREAR UN NUEVO PAIS*/
	public static function addPais($pais)
    {
      $sql = "SELECT * FROM create_pais('$pais->codigo','$pais->nombre')";
      $pais = new Pais();
      return new Resultset(null, $pais, $pais->getReadConnection()->query($sql));
    }

	/*ACTUALIZAR PAIS*/ 
	public static function updatePais($codigo,$pais )
	{
	  $sql = "SELECT * FROM update_pais('$codigo','$codigo','$pais->nombre')";
	  $pais = new Pais();
	  return new Resultset(null, $pais, $pais->getReadConnection()->query($sql));
	}
	
	/*ELIMINAR PAIS*/
	public static function deletePais($codigo)
    {
      $sql = "SELECT * FROM delete_pais('$codigo')";
      $pais = new Pais();
      return new Resultset(null, $pais, $pais->getReadConnection()->query($sql));
    }
}
