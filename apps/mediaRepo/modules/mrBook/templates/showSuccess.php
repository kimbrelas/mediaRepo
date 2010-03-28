<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Book->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Book->getName() ?></td>
    </tr>
    <tr>
      <th>Medium:</th>
      <td><?php echo $Book->getMedium() ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $Book->getYear() ?></td>
    </tr>
    <tr>
      <th>Author:</th>
      <td><?php echo $Book->getAuthor() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $Book->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('mrBook/edit?id='.$Book->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('mrBook/index') ?>">List</a>
