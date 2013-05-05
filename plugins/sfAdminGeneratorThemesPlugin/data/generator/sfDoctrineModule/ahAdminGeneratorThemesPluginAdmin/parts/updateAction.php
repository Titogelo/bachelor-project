  public function executeUpdate(sfWebRequest $request)
  {
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?> = $this->getRoute()->getObject();
    $this->form = $this->configuration->getEditForm($this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
