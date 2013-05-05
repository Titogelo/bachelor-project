<?php foreach ($this->configuration->getValue('show.display') as $name => $field): ?>
<?php echo $this->addCredentialCondition(sprintf(<<<EOF
<tr>
  <th>
    [?php echo __('%s', array(), '%s') ?]
  </th>
  <td class="sf_admin_%s sf_admin_show_td_%s">
    [?php echo %s ?]
  </td>
</tr>

EOF
, $field->getConfig('label', '', true), $this->getI18nCatalogue(), strtolower($field->getType()), $name, $this->renderField($field)), $field->getConfig()) ?>
<?php endforeach; ?>