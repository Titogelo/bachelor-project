<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Temporada', 'doctrine');

/**
 * BaseTemporada
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idtemporada
 * @property integer $anio
 * @property string $nombre
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $Categoria
 * 
 * @method integer             getIdtemporada() Returns the current record's "idtemporada" value
 * @method integer             getAnio()        Returns the current record's "anio" value
 * @method string              getNombre()      Returns the current record's "nombre" value
 * @method timestamp           getCreatedAt()   Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()   Returns the current record's "updated_at" value
 * @method Doctrine_Collection getCategoria()   Returns the current record's "Categoria" collection
 * @method Temporada           setIdtemporada() Sets the current record's "idtemporada" value
 * @method Temporada           setAnio()        Sets the current record's "anio" value
 * @method Temporada           setNombre()      Sets the current record's "nombre" value
 * @method Temporada           setCreatedAt()   Sets the current record's "created_at" value
 * @method Temporada           setUpdatedAt()   Sets the current record's "updated_at" value
 * @method Temporada           setCategoria()   Sets the current record's "Categoria" collection
 * 
 * @package    proy
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTemporada extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('temporada');
        $this->hasColumn('idtemporada', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('anio', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('nombre', 'string', 150, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 150,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Categoria', array(
             'local' => 'idtemporada',
             'foreign' => 'idtemporada'));
    }
}