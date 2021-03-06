<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Club', 'doctrine');

/**
 * BaseClub
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idclub
 * @property string $nombre
 * @property integer $fundacion
 * @property string $campo
 * @property string $escudo
 * @property float $capacidad
 * @property string $sede
 * @property string $historia
 * @property string $foto_campo
 * @property string $titulo_historia
 * @property Doctrine_Collection $Equipo
 * @property Doctrine_Collection $Persona
 * 
 * @method integer             getIdclub()          Returns the current record's "idclub" value
 * @method string              getNombre()          Returns the current record's "nombre" value
 * @method integer             getFundacion()       Returns the current record's "fundacion" value
 * @method string              getCampo()           Returns the current record's "campo" value
 * @method string              getEscudo()          Returns the current record's "escudo" value
 * @method float               getCapacidad()       Returns the current record's "capacidad" value
 * @method string              getSede()            Returns the current record's "sede" value
 * @method string              getHistoria()        Returns the current record's "historia" value
 * @method string              getFotoCampo()       Returns the current record's "foto_campo" value
 * @method string              getTituloHistoria()  Returns the current record's "titulo_historia" value
 * @method Doctrine_Collection getEquipo()          Returns the current record's "Equipo" collection
 * @method Doctrine_Collection getPersona()         Returns the current record's "Persona" collection
 * @method Club                setIdclub()          Sets the current record's "idclub" value
 * @method Club                setNombre()          Sets the current record's "nombre" value
 * @method Club                setFundacion()       Sets the current record's "fundacion" value
 * @method Club                setCampo()           Sets the current record's "campo" value
 * @method Club                setEscudo()          Sets the current record's "escudo" value
 * @method Club                setCapacidad()       Sets the current record's "capacidad" value
 * @method Club                setSede()            Sets the current record's "sede" value
 * @method Club                setHistoria()        Sets the current record's "historia" value
 * @method Club                setFotoCampo()       Sets the current record's "foto_campo" value
 * @method Club                setTituloHistoria()  Sets the current record's "titulo_historia" value
 * @method Club                setEquipo()          Sets the current record's "Equipo" collection
 * @method Club                setPersona()         Sets the current record's "Persona" collection
 * 
 * @package    proy
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClub extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('club');
        $this->hasColumn('idclub', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fundacion', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('campo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('escudo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('capacidad', 'float', 18, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 18,
             ));
        $this->hasColumn('sede', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('historia', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('foto_campo', 'string', 400, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 400,
             ));
        $this->hasColumn('titulo_historia', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Equipo', array(
             'local' => 'idclub',
             'foreign' => 'idclub'));

        $this->hasMany('Persona', array(
             'local' => 'idclub',
             'foreign' => 'idclub'));
    }
}