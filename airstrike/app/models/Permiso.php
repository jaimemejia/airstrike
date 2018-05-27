<?php

class Permiso extends \Phalcon\Mvc\Model
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
     * @Column(column="nombre", type="string", length=50, nullable=false)
     */
    public $nombre;

    /**
     *
     * @var integer
     * @Column(column="estado", type="integer", length=32, nullable=false)
     */
    public $estado;

    /**
     *
     * @var integer
     * @Column(column="menu_id", type="integer", length=32, nullable=false)
     */
    public $menu_id;

    /**
     *
     * @var integer
     * @Column(column="tipo_permiso_id", type="integer", length=32, nullable=false)
     */
    public $tipo_permiso_id;

    /**
     *
     * @var integer
     * @Column(column="rol_tipo", type="integer", length=32, nullable=false)
     */
    public $rol_tipo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("permiso");
        $this->belongsTo('tipo_permiso_id', '\TipoPermiso', 'id', ['alias' => 'TipoPermiso']);
        $this->belongsTo('menu_id', '\Menu', 'id', ['alias' => 'Menu']);
        $this->belongsTo('rol_tipo', '\Rol', 'tipo', ['alias' => 'Rol']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'permiso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permiso[]|Permiso|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permiso|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
