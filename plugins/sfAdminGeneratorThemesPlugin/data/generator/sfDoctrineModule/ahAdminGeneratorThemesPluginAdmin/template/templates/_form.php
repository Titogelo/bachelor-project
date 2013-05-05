[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="sf_admin_form">
  [?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>') ?]
    [?php echo $form->renderHiddenFields(false) ?]

    [?php if ($form->hasGlobalErrors()): ?]
      [?php echo $form->renderGlobalErrors() ?]
    [?php endif; ?]

    [?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo ahToolkit::variablize($this->getSingularName()) ?>' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]
    [?php endforeach; ?]

    <fieldset class="sf_fieldset_form_actions">
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo ahToolkit::variablize($this->getSingularName()) ?>' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
    </fieldset>
  </form>
</div>
