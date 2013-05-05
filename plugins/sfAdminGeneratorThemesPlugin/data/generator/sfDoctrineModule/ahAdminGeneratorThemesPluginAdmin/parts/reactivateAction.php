  public function executeReactivate(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?> = $this->getRoute()->getObject();

    $this->dispatcher->notify(new sfEvent($this, 'admin.reactivate_object', array('object' => $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>)));
    
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>->setIsArchived(false);
    
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>->save();
    
    ahToolkit::setFlash(ucfirst('<?php echo $this->getSingularName() ?>').' %1% successfully reactivated', 
      array('%1%' => '&raquo;'.$this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>.'&laquo;'));

    $this->redirect($this->getUser()->getNextRedirect());
  }
