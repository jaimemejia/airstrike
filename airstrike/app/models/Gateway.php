<?php

class Gateway extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="id_horario", type="integer", nullable=false)
     */
    public $id_horario;

    /**
     *
     * @var string
     * @Column(column="aeropuerto_codigo", type="string", length=8, nullable=false)
     */
    public $aeropuerto_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("gateway");
        $this->hasMany('id', 'ProgramacionVuelo', 'gateway_id', ['alias' => 'ProgramacionVuelo']);
        $this->belongsTo('id_horario', '\Horario', 'id', ['alias' => 'Horario']);
        $this->belongsTo('aeropuerto_codigo', '\Aeropuerto', 'codigo', ['alias' => 'Aeropuerto']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'gateway';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Gateway[]|Gateway|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Gateway|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
