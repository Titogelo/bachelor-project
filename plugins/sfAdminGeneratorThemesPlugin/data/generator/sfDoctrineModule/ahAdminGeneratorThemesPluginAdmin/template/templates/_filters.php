[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

[?php //if ($form->hasGlobalErrors()): ?]
  [?php //echo $form->renderGlobalErrors() ?]
[?php //endif; ?]

[?php slot('form_filter_fields') ?]
  [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
  [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
    )) ?]
  [?php endforeach; ?]
[?php end_slot(); ?]

<div class="filter_form">
  <h3>[?php echo ucfirst(__('Filter <?php echo $this->getPluralName() ?>')) ?]</h3>
  <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
    <table>
      <thead>
        <tr>
          [?php include_slot('form_filter_headers') ?]
          <th></th>
        </tr>
      </thead>
      <tr>
        [?php include_slot('form_filter_fields') ?]  
        <td>
          <input type="submit" value="[?php echo __('Filter <?php echo $this->getPluralName() ?>', array(), 'messages') ?]" />&nbsp;&nbsp;
          [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?]
          [?php echo $form->renderHiddenFields() ?]
        </td>
      </tr>
    </table>
  </form>
</div>