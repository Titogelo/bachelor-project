  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getNewForm();
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?> = $this->form->getObject();
  }
