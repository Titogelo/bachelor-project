<?php

class noticiaComponents extends sfComponents
{
	public function executeUltimasnoticias()
	{
		$this->noticias = Doctrine_Query::create()
			->from('noticia n')
			->orderBy('idNoticia desc')
			->limit('5')
			->execute();
	}
	
	public function executeUltimoscomentarios(){
		
		$this->comentarios = Doctrine_Query::create()
			->from('comentario n')
			->orderBy('idComentario desc')
			->limit('5')
			->execute();
	}
	
	public function executeUsuario(){
		$this->usuarios = Doctrine_Query::create()
			->from('usuario u')
			->where('idUsuario > 1')
			->limit('5')
			->execute();
	}
}
?>