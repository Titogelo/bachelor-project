  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getNewForm();
    $this-><?php echo ahToolkit::variablize($this->getSingularName()) ?> = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
