 
  protected function getConfig()
  {
    $configuration = parent::getConfig();
    $configuration['show'] = $this->getFieldsShow();
    return $configuration;
  }

  protected function compile()
  {
    parent::compile();
    
    $config = $this->getConfig();
     
    $this->configuration['show'] = array( 'fields'         => array(),
                                          'title'          => $this->getShowTitle(),
                                          'actions'        => $this->getShowActions(),
                                          'display'        => $this->getShowDisplay(),
                                        ) ;

    foreach (array_keys($config['default']) as $field)
    {
      $this->configuration['show']['fields'][$field]   = new sfModelGeneratorConfigurationField($field, array_merge(array('label' => sfInflector::humanize(sfInflector::underscore($field))), $config['default'][$field], isset($config['list'][$field]) ? $config['list'][$field] : array()));
    }
    
    // show field configuration
    $this->configuration['show']['display'] = array();
    foreach ($this->getShowDisplay() as $name)
    {
      list($name, $flag) = sfModelGeneratorConfigurationField::splitFieldWithFlag($name);
      if (!isset($this->configuration['show']['fields'][$name]))
      {
        throw new InvalidArgumentException(sprintf('The field "%s" does not exist.', $name));
      }
      $field = $this->configuration['show']['fields'][$name];
      $field->setFlag($flag);
      $this->configuration['show']['display'][$name] = $field;
    }
    
    // show actions
    foreach (array('show') as $context)
    {
      foreach ($this->configuration[$context]['actions'] as $action => $parameters)
      {
        $this->configuration[$context]['actions'][$action] = $this->fixActionParameters($action, $parameters);
      }
    }                              
  }
  
  public function getShowParams()
  {
    return <?php echo $this->asPhp(isset($this->config['show']['params']) ? $this->config['show']['params'] : '%%'.implode('%% - %%', isset($this->config['show']['display']) ? $this->config['show']['display'] : $this->getAllFieldNames(false)).'%%') ?>;
<?php unset($this->config['show']['params']) ?>
  }
  
  public function getShowActions()
  {
    return <?php echo $this->asPhp(isset($this->config['show']['actions']) ? $this->config['show']['actions'] : array('_list' => null, '_edit' => null)) ?>;
<?php unset($this->config['show']['actions']) ?>
  }

  public function getShowTitle()
  {
    return '<?php echo $this->escapeString(isset($this->config['show']['title']) ? $this->config['show']['title'] : ucfirst($this->getSingularName()).' Details') ?>';
<?php unset($this->config['show']['title']) ?>
  }

  public function getShowDisplay()
  {
  <?php if (isset($this->config['show']['display'])): ?>
    return <?php echo $this->asPhp($this->config['show']['display']) ?>;
<?php elseif (isset($this->config['show']['hide'])): ?>
    return <?php echo $this->asPhp(array_diff($this->getAllFieldNames(false), $this->config['show']['hide'])) ?>;
<?php else: ?>
    return <?php echo $this->asPhp($this->getAllFieldNames(false)) ?>;
<?php endif; ?>
<?php unset($this->config['show']['display'], $this->config['show']['hide']) ?>
  }