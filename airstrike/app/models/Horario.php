<?php

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

}
