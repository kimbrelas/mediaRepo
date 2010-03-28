<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Music->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Music->getName() ?></td>
    </tr>
    <tr>
      <th>Medium:</th>
      <td><?php echo $Music->getMedium() ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $Music->getYear() ?></td>
    </tr>
    <tr>
      <th>Artist:</th>
      <td><?php echo $Music->getArtist() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $Music->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('mrMusic/edit?id='.$Music->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('mrMusic/index') ?>">List</a>
