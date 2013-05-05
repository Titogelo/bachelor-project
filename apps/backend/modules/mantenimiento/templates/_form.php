<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('mantenimiento/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?idpartido='.$form->getObject()->getIdpartido() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('mantenimiento/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'mantenimiento/delete?idpartido='.$form->getObject()->getIdpartido(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['idjornada']->renderLabel() ?></th>
        <td>
          <?php echo $form['idjornada']->renderError() ?>
          <?php echo $form['idjornada'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['idequipolocal']->renderLabel() ?></th>
        <td>
          <?php echo $form['idequipolocal']->renderError() ?>
          <?php echo $form['idequipolocal'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['idequipovisitante']->renderLabel() ?></th>
        <td>
          <?php echo $form['idequipovisitante']->renderError() ?>
          <?php echo $form['idequipovisitante'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['goleslocal']->renderLabel() ?></th>
        <td>
          <?php echo $form['goleslocal']->renderError() ?>
          <?php echo $form['goleslocal'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['golesvisitante']->renderLabel() ?></th>
        <td>
          <?php echo $form['golesvisitante']->renderError() ?>
          <?php echo $form['golesvisitante'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['idcategoria']->renderLabel() ?></th>
        <td>
          <?php echo $form['idcategoria']->renderError() ?>
          <?php echo $form['idcategoria'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
