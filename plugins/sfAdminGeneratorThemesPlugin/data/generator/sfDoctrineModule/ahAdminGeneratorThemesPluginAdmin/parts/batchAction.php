  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    
    $model_class = '<?php echo $this->getModelClass() ?>';
    $model_singular_name = '<?php echo $this->getSingularName() ?>';
    $model_plural_name = '<?php echo $this->getPluralName() ?>';

    if (!$ids = $request->getParameter('ids'))
    {
      if (!$action = $request->getParameter('batch_action')) ahToolkit::setFlash('You must select at least one '.$model_singular_name.' and an action to execute.', array(), 'ahError');
      else ahToolkit::setFlash('You must select at least one '.$model_singular_name.'.', array(), 'ahError');

      $this->redirect($this->getUser()->getNextRedirect());
    }
    
    if (!$action = $request->getParameter('batch_action'))
    {
      ahToolkit::setFlash('You must select an action to execute on the selected '.$model_plural_name.'.', array(), 'ahError');

      $this->redirect($this->getUser()->getNextRedirect());
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }
    
    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => $model_class));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      ahToolkit::setFlash('A problem occurred when deleting the selected '.$model_plural_name.' as some '.$model_plural_name.' do not exist anymore.', array(), 'ahError');
    }

    $this->redirect($this->getUser()->getNextRedirect());
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    
    $model_class = '<?php echo $this->getModelClass() ?>';
    $model_plural_name = '<?php echo $this->getPluralName() ?>';

    $records = Doctrine_Query::create()
      ->from($model_class)
      ->whereIn('<?php echo $this->getPrimaryKeys(true) ?>', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $record->delete();
    }
    
    ahToolkit::setFlash('The selected '.$model_plural_name.' have been deleted successfully.');
    $this->redirect($this->getUser()->getNextRedirect());
  }
