<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Directivo', 'doctrine');

/**
 * BaseDirectivo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $iddirectivo
 * @property integer $idpersona
 * @property string $cargo
 * @property string $antecesor
 * @property string $observaciones
 * @property Persona $Persona
 * 
 * @method integer   getIddirectivo()   Returns the current record's "iddirectivo" value
 * @method integer   getIdpersona()     Returns the current record's "idpersona" value
 * @method string    getCargo()         Returns the current record's "cargo" value
 * @method string    getAntecesor()     Returns the current record's "antecesor" value
 * @method string    getObservaciones() Returns the current record's "observaciones" value
 * @method Persona   getPersona()       Returns the current record's "Persona" value
 * @method Directivo setIddirectivo()   Sets the current record's "iddirectivo" value
 * @method Directivo setIdpersona()     Sets the current record's "idpersona" value
 * @method Directivo setCargo()         Sets the current record's "cargo" value
 * @method Directivo setAntecesor()     Sets the current record's "antecesor" value
 * @method Directivo setObservaciones() Sets the current record's "observaciones" value
 * @method Directivo setPersona()       Sets the current record's "Persona" value
 * 
 * @package    proy
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDirectivo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('directivo');
        $this->hasColumn('iddirectivo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('idpersona', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cargo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('antecesor', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('observaciones', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Persona', array(
             'local' => 'idpersona',
             'foreign' => 'idpersona'));
    }
}