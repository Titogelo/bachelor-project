  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setNextRedirect('@<?php echo $this->getUrlForAction('list') ?>');
    
    // sorting
    $sort = $request->getParameter('sort', false);
    if ($sort && ($this->isValidSortColumn($sort) || $this->isValidCustomSortColumn($sort)))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->hasParameter('page'))
    {
      $this->setPage($request->getParameter('page'), $request->getParameter('submodule'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }
