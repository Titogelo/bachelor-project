<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Partido', 'doctrine');

/**
 * BasePartido
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idjornada
 * @property integer $idequipolocal
 * @property integer $idequipovisitante
 * @property integer $goleslocal
 * @property integer $golesvisitante
 * @property integer $idcategoria
 * @property integer $idpartido
 * @property integer $actualizado
 * @property Categoria $Categoria
 * @property Equipo $Equipo
 * @property Equipo $Equipo_3
 * @property Jornada $Jornada
 * @property Doctrine_Collection $Goles
 * 
 * @method integer             getIdjornada()         Returns the current record's "idjornada" value
 * @method integer             getIdequipolocal()     Returns the current record's "idequipolocal" value
 * @method integer             getIdequipovisitante() Returns the current record's "idequipovisitante" value
 * @method integer             getGoleslocal()        Returns the current record's "goleslocal" value
 * @method integer             getGolesvisitante()    Returns the current record's "golesvisitante" value
 * @method integer             getIdcategoria()       Returns the current record's "idcategoria" value
 * @method integer             getIdpartido()         Returns the current record's "idpartido" value
 * @method integer             getActualizado()       Returns the current record's "actualizado" value
 * @method Categoria           getCategoria()         Returns the current record's "Categoria" value
 * @method Equipo              getEquipo()            Returns the current record's "Equipo" value
 * @method Equipo              getEquipo3()           Returns the current record's "Equipo_3" value
 * @method Jornada             getJornada()           Returns the current record's "Jornada" value
 * @method Doctrine_Collection getGoles()             Returns the current record's "Goles" collection
 * @method Partido             setIdjornada()         Sets the current record's "idjornada" value
 * @method Partido             setIdequipolocal()     Sets the current record's "idequipolocal" value
 * @method Partido             setIdequipovisitante() Sets the current record's "idequipovisitante" value
 * @method Partido             setGoleslocal()        Sets the current record's "goleslocal" value
 * @method Partido             setGolesvisitante()    Sets the current record's "golesvisitante" value
 * @method Partido             setIdcategoria()       Sets the current record's "idcategoria" value
 * @method Partido             setIdpartido()         Sets the current record's "idpartido" value
 * @method Partido             setActualizado()       Sets the current record's "actualizado" value
 * @method Partido             setCategoria()         Sets the current record's "Categoria" value
 * @method Partido             setEquipo()            Sets the current record's "Equipo" value
 * @method Partido             setEquipo3()           Sets the current record's "Equipo_3" value
 * @method Partido             setJornada()           Sets the current record's "Jornada" value
 * @method Partido             setGoles()             Sets the current record's "Goles" collection
 * 
 * @package    proy
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePartido extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('partido');
        $this->hasColumn('idjornada', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('idequipolocal', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('idequipovisitante', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('goleslocal', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('golesvisitante', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('idcategoria', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('idpartido', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('actualizado', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Categoria', array(
             'local' => 'idcategoria',
             'foreign' => 'idcategoria'));

        $this->hasOne('Equipo', array(
             'local' => 'idequipolocal',
             'foreign' => 'idequipo'));

        $this->hasOne('Equipo as Equipo_3', array(
             'local' => 'idequipovisitante',
             'foreign' => 'idequipo'));

        $this->hasOne('Jornada', array(
             'local' => 'idjornada',
             'foreign' => 'idjornada'));

        $this->hasMany('Goles', array(
             'local' => 'idpartido',
             'foreign' => 'idpartido'));
    }
}