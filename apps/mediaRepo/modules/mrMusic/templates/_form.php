<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('mrMusic/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('mrMusic/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'mrMusic/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['medium']->renderLabel() ?></th>
        <td>
          <?php echo $form['medium']->renderError() ?>
          <?php echo $form['medium'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['year']->renderLabel() ?></th>
        <td>
          <?php echo $form['year']->renderError() ?>
          <?php echo $form['year'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['artist']->renderLabel() ?></th>
        <td>
          <?php echo $form['artist']->renderError() ?>
          <?php echo $form['artist'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
