  public function executeArchive(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.archive_object', array('object' => $this->getRoute()->getObject())));

    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?> = $this->getRoute()->getObject();
    
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>->setIsArchived(true);
    
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>->save();
    
    ahToolkit::setFlash(ucfirst('<?php echo $this->getSingularName() ?>').' %1% successfully archived', 
      array('%1%' => '&raquo;'.$this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>.'&laquo;'));

    $this->redirect($this->getUser()->getNextRedirect());
  }
