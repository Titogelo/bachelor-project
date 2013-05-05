  <!--<div class="clearfix">-->
  [?php if (has_component_slot('show_header')) include_component_slot('show_header') ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/show_header', array('<?php echo ahToolkit::variablize($this->getSingularName()) ?>' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>, 'helper' => $helper)) ?]
  <table>
    <tbody>
      [?php include_partial('<?php echo $this->getModuleName() ?>/show_tr_<?php echo $this->configuration->getValue('list.layout') ?>', array('<?php echo ahToolkit::variablize($this->getSingularName()) ?>' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>, 'helper' => $helper)) ?]
    </tbody>
  </table>
  <!--</div>-->
  [?php include_partial('<?php echo $this->getModuleName() ?>/show_footer', array('<?php echo ahToolkit::variablize($this->getSingularName()) ?>' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>, 'helper' => $helper)) ?]
  [?php if (has_component_slot('show_footer')) include_component_slot('show_footer') ?]