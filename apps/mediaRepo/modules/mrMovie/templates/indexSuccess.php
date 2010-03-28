<h1>Movies List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Format</th>
      <th>User</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Movies as $Movie): ?>
    <tr>
      <td><a href="<?php echo url_for('mrMovie/show?id='.$Movie->getId()) ?>"><?php echo $Movie->getId() ?></a></td>
      <td><?php echo $Movie->getName() ?></td>
      <td><?php echo $Movie->getMedium() ?></td>
      <td><?php echo $Movie->getYear() ?></td>
      <td><?php echo $Movie->getFormat() ?></td>
      <td><?php echo $Movie->getUserId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mrMovie/new') ?>">New</a>
