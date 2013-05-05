[?php $submodule = has_slot('current_submodule') ? '&submodule='.get_slot('current_submodule') : ''; ?]
<div class="sf_admin_pagination">
  <span class="left_image_controls">
    [?php if ($pager->getPage() > 1): ?]
      <a class="image_controls" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1[?php echo $submodule ?]">
        [?php echo image_tag('icons/control_start_blue.png', array('alt' => __('First page', array(), 'sf_admin'), 'title' => __('First page', array(), 'sf_admin'))) ?]
      </a>
      <a class="image_controls" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?][?php echo $submodule ?]">
        [?php echo image_tag('icons/control_rewind_blue.png', array('alt' => __('Previous page', array(), 'sf_admin'), 'title' => __('Previous page', array(), 'sf_admin'))) ?]
      </a>
    [?php else: ?]
      [?php echo image_tag('icons/control_start.png') ?]
      [?php echo image_tag('icons/control_rewind.png') ?]
    [?php endif; ?]
  </span>

  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
      <span class="current_page">[?php echo $page ?]</span>
    [?php else: ?]
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?][?php echo $submodule ?]">[?php echo $page ?]</a>
    [?php endif; ?]
  [?php endforeach; ?]

  <span class="right_image_controls">
    [?php if ($pager->getPage() < $pager->getLastPage()): ?]
      <a class="image_controls" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?][?php echo $submodule ?]">
        [?php echo image_tag('icons/control_fastforward_blue.png', array('alt' => __('Next page', array(), 'sf_admin'), 'title' => __('Next page', array(), 'sf_admin'))) ?]
      </a>
      <a class="image_controls" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?][?php echo $submodule ?]">
        [?php echo image_tag('icons/control_end_blue.png', array('alt' => __('Last page', array(), 'sf_admin'), 'title' => __('Last page', array(), 'sf_admin'))) ?]
      </a>
    [?php else: ?]
      [?php echo image_tag('icons/control_fastforward.png') ?]
      [?php echo image_tag('icons/control_end.png') ?]
    [?php endif; ?]
  </span>
</div>
