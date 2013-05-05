  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $is_new = $form->getObject()->isNew();
      try {
        $<?php echo ahToolkit::variablize($this->getSingularName()) ?> = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');
        
        ahToolkit::setFlash($message, array(), 'ahError');
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>)));

      if ($request->hasParameter('_save_and_add'))
      {
        ahToolkit::setFlash(ucfirst('<?php echo $this->getSingularName() ?>').' %1% successfully '.($is_new ? 'created' : 'updated'), 
          array('%1%' => '&raquo;'.$form->getObject().'&laquo;'));

        $this->redirect('@<?php echo $this->getUrlForAction('new') ?>');
      }
      else
      {
        ahToolkit::setFlash(ucfirst('<?php echo $this->getSingularName() ?>').' %1% successfully '.($is_new ? 'created' : 'updated'), 
          array('%1%' => '&raquo;'.$form->getObject().'&laquo;'));

        $this->redirect($this->getUser()->getNextRedirect());
      }
    }
  }
