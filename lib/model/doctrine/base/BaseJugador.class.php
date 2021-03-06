<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Jugador', 'doctrine');

/**
 * BaseJugador
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idjugador
 * @property integer $idpersona
 * @property integer $goles
 * @property float $altura
 * @property float $peso
 * @property integer $amarillas
 * @property integer $rojas
 * @property integer $idequipo
 * @property string $posicion
 * @property Persona $Persona
 * @property Equipo $Equipo
 * @property Doctrine_Collection $Goles
 * 
 * @method integer             getIdjugador() Returns the current record's "idjugador" value
 * @method integer             getIdpersona() Returns the current record's "idpersona" value
 * @method integer             getGoles()     Returns the current record's "goles" value
 * @method float               getAltura()    Returns the current record's "altura" value
 * @method float               getPeso()      Returns the current record's "peso" value
 * @method integer             getAmarillas() Returns the current record's "amarillas" value
 * @method integer             getRojas()     Returns the current record's "rojas" value
 * @method integer             getIdequipo()  Returns the current record's "idequipo" value
 * @method string              getPosicion()  Returns the current record's "posicion" value
 * @method Persona             getPersona()   Returns the current record's "Persona" value
 * @method Equipo              getEquipo()    Returns the current record's "Equipo" value
 * @method Doctrine_Collection getGoles()     Returns the current record's "Goles" collection
 * @method Jugador             setIdjugador() Sets the current record's "idjugador" value
 * @method Jugador             setIdpersona() Sets the current record's "idpersona" value
 * @method Jugador             setGoles()     Sets the current record's "goles" value
 * @method Jugador             setAltura()    Sets the current record's "altura" value
 * @method Jugador             setPeso()      Sets the current record's "peso" value
 * @method Jugador             setAmarillas() Sets the current record's "amarillas" value
 * @method Jugador             setRojas()     Sets the current record's "rojas" value
 * @method Jugador             setIdequipo()  Sets the current record's "idequipo" value
 * @method Jugador             setPosicion()  Sets the current record's "posicion" value
 * @method Jugador             setPersona()   Sets the current record's "Persona" value
 * @method Jugador             setEquipo()    Sets the current record's "Equipo" value
 * @method Jugador             setGoles()     Sets the current record's "Goles" collection
 * 
 * @package    proy
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseJugador extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('jugador');
        $this->hasColumn('idjugador', 'integer', 4, array(
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
        $this->hasColumn('goles', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('altura', 'float', 18, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0.00',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 18,
             ));
        $this->hasColumn('peso', 'float', 18, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0.00',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 18,
             ));
        $this->hasColumn('amarillas', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('rojas', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('idequipo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('posicion', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Persona', array(
             'local' => 'idpersona',
             'foreign' => 'idpersona'));

        $this->hasOne('Equipo', array(
             'local' => 'idequipo',
             'foreign' => 'idequipo'));

        $this->hasMany('Goles', array(
             'local' => 'idjugador',
             'foreign' => 'idjugador'));
    }
}