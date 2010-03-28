<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Game->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Game->getName() ?></td>
    </tr>
    <tr>
      <th>Medium:</th>
      <td><?php echo $Game->getMedium() ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $Game->getYear() ?></td>
    </tr>
    <tr>
      <th>Platform:</th>
      <td><?php echo $Game->getPlatform() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $Game->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('mrGame/edit?id='.$Game->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('mrGame/index') ?>">List</a>
