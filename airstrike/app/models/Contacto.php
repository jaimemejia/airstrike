<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Contacto extends \Phalcon\Mvc\Model
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
     * @Column(column="direccion_web", type="string", nullable=false)
     */
    public $direccion_web;

    /**
     *
     * @var integer
     * @Column(column="nombre", type="integer", length=32, nullable=false)
     */
    public $nombre;

    /**
     *
     * @var integer
     * @Column(column="linea_aerea_codigo", type="integer", nullable=false)
     */
    public $linea_aerea_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("contacto");
        $this->belongsTo('linea_aerea_codigo', '\LineaAerea', 'codigo', ['alias' => 'LineaAerea']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'contacto';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contacto[]|Contacto|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contacto|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
	
	/*OBTENER TODOS LOS CONTACTOS*/
	public static function getAll()
    {
      $sql = "SELECT * FROM get_contacto()";
      $contacto = new Contacto();
      return new Resultset(null, $contacto, $contacto->getReadConnection()->query($sql));
    }
	
	/*OBTENER CONTACTO POR ID*/
	public static function getById($id)
    {
      $sql = "SELECT * FROM get_contacto('$id')";
      $contacto = new Contacto();
      return new Resultset(null, $contacto, $contacto->getReadConnection()->query($sql));
    }
	
	/*CREAR UN NUEVO CONTACTO*/
	public static function addContacto($contacto)
    {
      $sql = "SELECT * FROM create_contacto('$contacto->direccion_web','$contacto->nombre','$contacto->linea_aerea_codigo')";
      $contacto = new Contacto();
      return new Resultset(null, $contacto, $contacto->getReadConnection()->query($sql));
    }

	/*ACTUALIZAR CONTACTO*/ 
	public static function updateContacto($id,$contacto)
	{
	  $sql = "SELECT * FROM update_contacto('$id','$contacto->direccion_web','$contacto->nombre','$contacto->linea_aerea_codigo')";
	  $contacto = new Contacto();
	  return new Resultset(null, $contacto, $contacto->getReadConnection()->query($sql));
	}
	
	/*ELIMINAR CONTACTO*/
	public static function deleteContacto($id)
    {
      $sql = "SELECT * FROM delete_contacto('$id')";
      $contacto = new Contacto();
      return new Resultset(null, $contacto, $contacto->getReadConnection()->query($sql));
    }

}
