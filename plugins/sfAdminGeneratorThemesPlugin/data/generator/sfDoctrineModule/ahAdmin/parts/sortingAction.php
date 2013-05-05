<?php
$customSorts = array();
foreach ($this->configuration->getValue('list.display') as $name => $field)
{
  if ($customSort = $field->getConfig('sort_method', false, false))
  {
    $customSorts[$name] = $customSort;
  }
}
?>

  protected function addSortQuery($query)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return $query;
    }
    
    if (!in_array(strtolower($sort[1]), array('asc', 'desc')))
    {
      $sort[1] = 'asc';
    }

<?php if ($customSorts): ?>
    $customSorts = $this->getCustomSorts();
<?php endif; ?>

    if ($this->isValidSortColumn($sort[0]))
    {
      return $query->orderBy($sort[0] . ' ' . $sort[1]);
    }
    elseif (isset($customSorts) && isset($customSorts[$sort[0]]) && $this->isValidCustomSortMethod($customSorts[$sort[0]]))
    {
      $method = $customSorts[$sort[0]];
      
      return Doctrine::getTable('<?php echo $this->getModelClass() ?>')->$method($query, $sort[1]);
    }
    elseif ($this->isValidCustomSortColumn($sort[0]))
    {
      $method = sprintf('orderBy%s', sfInflector::camelize($sort[0]));
      
      return Doctrine::getTable('<?php echo $this->getModelClass() ?>')->$method($query, $sort[1]);
    }
    else
    {
      $this->resetSort();
    }
    
    return $query;
  }

  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.sort', null, 'admin_module'))
    {
      if (isset($sort[1])) $sort[1] = strtolower($sort[1]);
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {    
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }
    
    $sort[1] = strtolower($sort[1]);
    
    $this->getUser()->setAttribute('<?php echo $this->getModuleName() ?>.sort', $sort, 'admin_module');
  }
  
  protected function resetSort()
  {
    $this->getUser()->setAttribute('<?php echo $this->getModuleName() ?>.sort', null, 'admin_module');
  }

  protected function isValidSortColumn($column)
  {
    return Doctrine::getTable('<?php echo $this->getModelClass() ?>')->hasColumn($column);
  }
  
  protected function isValidCustomSortColumn($column)
  {
    return method_exists(Doctrine::getTable('<?php echo $this->getModelClass() ?>'), 'orderBy'.sfInflector::camelize($column));
  }
  
  protected function isValidCustomSortMethod($method)
  {
    return method_exists(Doctrine::getTable('<?php echo $this->getModelClass() ?>'), $method);
  }

<?php if ($customSorts): ?>
  protected function getCustomSorts()
  {
    return <?php echo $this->asPhp($customSorts) ?>;
  }
<?php endif ?>
