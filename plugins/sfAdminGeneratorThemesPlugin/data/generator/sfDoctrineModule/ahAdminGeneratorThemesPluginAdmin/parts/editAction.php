  public function executeEdit(sfWebRequest $request)
  {
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?> = $this->getRoute()->getObject();
    $this->form = $this->configuration->getEditForm($this-><?php echo ahToolkit::variablize($this->getSingularName()) ?>);
  }
