<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Noticia', 'doctrine');

/**
 * BaseNoticia
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idnoticia
 * @property string $titulo
 * @property string $cuerpo
 * @property integer $idusuario
 * @property string $imagen
 * @property string $descripcionimagen
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $Comentario
 * @property SfGuardUserProfile $SfGuardUserProfile
 * 
 * @method integer             getIdnoticia()          Returns the current record's "idnoticia" value
 * @method string              getTitulo()             Returns the current record's "titulo" value
 * @method string              getCuerpo()             Returns the current record's "cuerpo" value
 * @method integer             getIdusuario()          Returns the current record's "idusuario" value
 * @method string              getImagen()             Returns the current record's "imagen" value
 * @method string              getDescripcionimagen()  Returns the current record's "descripcionimagen" value
 * @method timestamp           getCreatedAt()          Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()          Returns the current record's "updated_at" value
 * @method Doctrine_Collection getComentario()         Returns the current record's "Comentario" collection
 * @method SfGuardUserProfile  getSfGuardUserProfile() Returns the current record's "SfGuardUserProfile" value
 * @method Noticia             setIdnoticia()          Sets the current record's "idnoticia" value
 * @method Noticia             setTitulo()             Sets the current record's "titulo" value
 * @method Noticia             setCuerpo()             Sets the current record's "cuerpo" value
 * @method Noticia             setIdusuario()          Sets the current record's "idusuario" value
 * @method Noticia             setImagen()             Sets the current record's "imagen" value
 * @method Noticia             setDescripcionimagen()  Sets the current record's "descripcionimagen" value
 * @method Noticia             setCreatedAt()          Sets the current record's "created_at" value
 * @method Noticia             setUpdatedAt()          Sets the current record's "updated_at" value
 * @method Noticia             setComentario()         Sets the current record's "Comentario" collection
 * @method Noticia             setSfGuardUserProfile() Sets the current record's "SfGuardUserProfile" value
 * 
 * @package    proy
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNoticia extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('noticia');
        $this->hasColumn('idnoticia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('titulo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('cuerpo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('idusuario', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('imagen', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('descripcionimagen', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
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
        $this->hasMany('Comentario', array(
             'local' => 'idnoticia',
             'foreign' => 'idnoticia'));

        $this->hasOne('SfGuardUserProfile', array(
             'local' => 'idusuario',
             'foreign' => 'idusuario'));
    }
}