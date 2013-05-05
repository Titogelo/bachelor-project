<?php

/**
* noticia actions.
*
* @package    proy
* @subpackage noticia
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class noticiaActions extends sfActions
{
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
		
	public function executeIndex(sfWebRequest $request){
		
	}
	
	public function executeShow(sfWebRequest $request){
		$this->noticia = Doctrine::getTable('noticia')->find($request->getParameter('id'));
	}
	
	public function executeEnviar(sfWebRequest $request)
	{
		$nombre = $request->getParameter('nombre');
		$email = $request->getParameter('email');
		$website = $request->getParameter('website');
		$coment = $request->getParameter('comentario');
		$id_noticia = $request->getParameter('id_noticia');
		$foto = $request->getParameter('foto');
		$fecha_hora =  date("Y-m-d H:i:s");
               
		// Validate form
		if($nombre == "" || $email == "" ) {
			// Redirect to regisration form and display error in the form ($this->redirect()) is custom symfony method to perform url redirections)
		
		        /*$this->redirect('noticias/index?error=blankFields');*/
		}
		else {
			// Perform Registration, create a new users object
			// Refer C:\Workspace\Symfony\Authentication\lib\model\om\BaseUsers.php and 
			// C:\Workspace\Symfony\Authentication\lib\model\om\BaseUsersPeer.php for reference
			$comentario = new Comentario();
			
			$comentario->setIdNoticia($id_noticia);
			$comentario->setCreatedAt($fecha_hora);
			$comentario->setIdUsuario($nombre);
			$comentario->setCuerpo($coment);
			$comentario->setAvatar($foto);
			
			$noticia = $comentario->save();
			
			// Get Id of the user just inserted
			$comentId = $comentario->getIdComentario();
			if($comentId) {
				// Redirect to main site page
				$url = "noticia/index";
				$this->redirect($url);
				//$this->redirect(array('sf_route' => 'comentario_write', 'sf_subject' => $comentario));
			}
			else {
				$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $noticia)));

				$this->getUser()->setFlash('notice', ' You can add another one below.');
				$this->redirect(array('sf_route' => 'noticia_edit', 'sf_subject' => $noticia));
			}
			$this->redirect('noticia/index');
		}
	}
}
