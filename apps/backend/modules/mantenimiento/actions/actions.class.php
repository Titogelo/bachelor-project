<?php

/**
* mantenimiento actions.
*
* @package    proy
* @subpackage mantenimiento
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class mantenimientoActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->partidos = Doctrine_Core::getTable('partido')
			->createQuery('a')
			->execute();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new partidoForm();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new partidoForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($partido = Doctrine_Core::getTable('partido')->find(array($request->getParameter('idpartido'))), sprintf('Object partido does not exist (%s).', $request->getParameter('idpartido')));
		$this->form = new partidoForm($partido);
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($partido = Doctrine_Core::getTable('partido')->find(array($request->getParameter('idpartido'))), sprintf('Object partido does not exist (%s).', $request->getParameter('idpartido')));
		$this->form = new partidoForm($partido);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->forward404Unless($partido = Doctrine_Core::getTable('partido')->find(array($request->getParameter('idpartido'))), sprintf('Object partido does not exist (%s).', $request->getParameter('idpartido')));
		$partido->delete();

		$this->redirect('mantenimiento/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$partido = $form->save();
				
			$this->redirect('mantenimiento/edit?idpartido='.$partido->getIdpartido());
		}
	}
}
