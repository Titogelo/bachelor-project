  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    
    $object = $this->getRoute()->getObject();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $object)));
    
    $object_representation = $object->__toString();

    $object->delete();
    
    ahToolkit::setFlash(ucfirst('<?php echo $this->getSingularName() ?>').' %1% successfully deleted', 
      array('%1%' => '&raquo;'.$object_representation.'&laquo;'));

    $this->redirect($this->getUser()->getNextRedirect());
  }
