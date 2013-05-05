<?php
 
include(dirname(__FILE__).'/../bootstrap/unit.php');
 
// Funciones y objetos vacíos para las pruenas
class miObjeto
{
  public function miMetodo()
  {
  }
}
 
function lanza_una_excepcion()
{
  throw new Exception('excepción lanzada');
}
 
// Inicializar el objeto de pruebas
$t = new lime_test(16, new lime_output_color());
 
$t->diag('hola mundo');
$t->ok(1 == '1', 'el operador de igualdad ignora el tipo de la variable');
$t->is(1, '1', 'las cadenas se convierten en números para realizar la comparación');
$t->isnt(0, 1, '0 y 1 no son lo mismo');
$t->like('prueba01', '/prueba\d+/', 'prueba01 sigue el patrón para numerar las pruebas');
$t->unlike('pruebas01', '/prueba\d+/', 'pruebas01 no sigue el patrón');
$t->cmp_ok(1, '<', 2, '1 es inferior a 2');
$t->cmp_ok(1, '!==', true, '1 y true no son exactamente lo mismo');
$t->isa_ok('valor', 'string', '\'valor\' es una cadena de texto');
$t->isa_ok(new miObjeto(), 'miObjeto', 'new crea un objeto de la clase correcta');
$t->can_ok(new miObjeto(), 'miMetodo', 'los objetos de la clase miObjeto tienen un método llamado miMetodo');
$array1 = array(1, 2, array(1 => 'valor', 'a' => '4'));
$t->is_deeply($array1, array(1, 2, array(1 => 'valor', 'a' => '4')),
    'el primer array y el segundo array son iguales');
$t->include_ok('./strtolowerTest.php', 'el archivo nombreArchivo.php ha sido incluido correctamente');
 
try
{
  lanza_una_excepcion();
  $t->fail('no debería ejecutarse ningún código después de lanzarse la excepción');
}
catch (Exception $e)
{
  $t->pass('la excepción ha sido capturada correctamente');
}
 
if (!isset($variable))
{
  $t->skip('saltamos una prueba para mantener el contador de pruebas correcto para la condición', 1);
}
else
{
  $t->ok($variable, 'valor');
}
 
$t->todo('la última prueba que falta');