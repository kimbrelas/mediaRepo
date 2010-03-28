<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Movie->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Movie->getName() ?></td>
    </tr>
    <tr>
      <th>Medium:</th>
      <td><?php echo $Movie->getMedium() ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $Movie->getYear() ?></td>
    </tr>
    <tr>
      <th>Format:</th>
      <td><?php echo $Movie->getFormat() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $Movie->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('mrMovie/edit?id='.$Movie->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('mrMovie/index') ?>">List</a>
