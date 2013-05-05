[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

[?php slot('module_header', <?php echo $this->getI18NString('show.title') ?>) ?]
[?php sfContext::getInstance()->getResponse()->setTitle($<?php echo ahToolkit::variablize($this->getSingularName()) ?>) ?]

<h2 class="no_top_padding">[?php echo $<?php echo ahToolkit::variablize($this->getSingularName()) ?> ?]</h2>

[?php include_partial('<?php echo $this->getModuleName() ?>/show', array('<?php echo ahToolkit::variablize($this->getSingularName()) ?>' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>, 'helper' => $helper)) ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/show_actions', array('<?php echo ahToolkit::variablize($this->getSingularName()) ?>' => $<?php echo ahToolkit::variablize($this->getSingularName()) ?>, 'configuration' => $configuration, 'helper' => $helper)) ?]
