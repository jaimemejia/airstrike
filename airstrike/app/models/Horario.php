<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Horario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="hora", type="string", nullable=false)
     */
    public $hora;

    /**
     *
     * @var string
     * @Column(column="tiempo_abordaje", type="string", nullable=false)
     */
    public $tiempo_abordaje;

    /**
     *
     * @var string
     * @Column(column="tiempo_desabordaje", type="string", nullable=false)
     */
    public $tiempo_desabordaje;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("horario");
        $this->hasMany('id', 'Gateway', 'id_horario', ['alias' => 'Gateway']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'horario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Horario[]|Horario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Horario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
	
	/*OBTENER TODOS LOS HORARIOS*/
	public static function getAll()
    {
      $sql = "SELECT * FROM get_horario()";
      $horario = new Horario();
      return new Resultset(null, $horario, $horario->getReadConnection()->query($sql));
    }
	
	/*OBTENER HORARIO POR ID*/
	public static function getById($id)
    {
      $sql = "SELECT * FROM get_horario('$id')";
      $horario = new Horario();
      return new Resultset(null, $horario, $horario->getReadConnection()->query($sql));
    }
	
	/*CREAR UN NUEVO HORARIO*/
	public static function addHorario($horario)
    {
      $sql = "SELECT * FROM create_horario('$horario->hora','$horario->tiempo_abordaje','$horario->tiempo_desabordaje')";
      $horario = new Horario();
      return new Resultset(null, $horario, $horario->getReadConnection()->query($sql));
    }

	/*ACTUALIZAR HORARIO*/ 
	public static function updateHorario($id,$horario)
	{
	  $sql = "SELECT * FROM update_horario('$id','$horario->hora','$horario->tiempo_abordaje','$horario->tiempo_desabordaje')";
	  $horario = new Horario();
	  return new Resultset(null, $horario, $horario->getReadConnection()->query($sql));
	}
	
	/*ELIMINAR HORARIO*/
	public static function deleteHorario($id)
    {
      $sql = "SELECT * FROM delete_horario('$id')";
      $horario = new Horario();
      return new Resultset(null, $horario, $horario->getReadConnection()->query($sql));
    }
}
