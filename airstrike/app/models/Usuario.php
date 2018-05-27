<?php

class Usuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_usuario", type="integer", nullable=false)
     */
    public $id_usuario;

    /**
     *
     * @var integer
     * @Column(column="id_rol", type="integer", length=32, nullable=false)
     */
    public $id_rol;

    /**
     *
     * @var integer
     * @Column(column="id_estado", type="integer", length=32, nullable=false)
     */
    public $id_estado;

    /**
     *
     * @var integer
     * @Column(column="millas", type="integer", length=32, nullable=false)
     */
    public $millas;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("usuario");
        $this->hasMany('id_usuario', 'Cliente', 'id_usuario', ['alias' => 'Cliente']);
        $this->belongsTo('id_rol', '\Rol', 'tipo', ['alias' => 'Rol']);
        $this->belongsTo('id_estado', '\Estado', 'id', ['alias' => 'Estado']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]|Usuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
