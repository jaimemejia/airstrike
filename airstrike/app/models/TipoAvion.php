<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class TipoAvion extends \Phalcon\Mvc\Model
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
     * @Column(column="nombre", type="string", nullable=false)
     */
    public $nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("tipo_avion");
        $this->hasMany('id', 'Avion', 'tipo_avion_id', ['alias' => 'Avion']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_avion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoAvion[]|TipoAvion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoAvion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

     public static function getAll(){
       $sql = "select * from get_all_tipo_avion()";
       $tipoAvion = new TipoAvion();
       return new Resultset(null, $tipoAvion, $tipoAvion->getReadConnection()->query($sql));

     }

     public static function getById($id)
     {
       $sql = "SELECT * FROM get_one_tipo_avion('$id')";
       $tipoAvion  = new TipoAvion();
       return new Resultset(null, $tipoAvion, $tipoAvion->getReadConnection()->query($sql));
     }



     public static function addTipoAvion($tipoAvion)
     {
       $sql = "SELECT * FROM create_tipo_avion('$tipoAvion->nombre')";
       $tipoAvion = new TipoAvion();
       return new Resultset(null, $tipoAvion, $tipoAvion->getReadConnection()->query($sql));
     }

     public static function updateTipoAvion($id, $tipoAvion )
     {
       $sql = "SELECT * FROM update_tipo_avion('$id','$tipoAvion->nombre')";
       $tipoAvion = new TipoAvion();
       return new Resultset(null, $tipoAvion, $tipoAvion->getReadConnection()->query($sql));
     }

     public static function deleteTipoAvion($id)
     {
       $sql = "SELECT * FROM delete_tipo_avion('$id')";
       $tipoAvion = new TipoAvion();
       return new Resultset(null, $tipoAvion, $tipoAvion->getReadConnection()->query($sql));
     }


}
