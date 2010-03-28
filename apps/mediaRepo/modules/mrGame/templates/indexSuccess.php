<h1>Games List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Platform</th>
      <th>User</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Games as $Game): ?>
    <tr>
      <td><a href="<?php echo url_for('mrGame/show?id='.$Game->getId()) ?>"><?php echo $Game->getId() ?></a></td>
      <td><?php echo $Game->getName() ?></td>
      <td><?php echo $Game->getMedium() ?></td>
      <td><?php echo $Game->getYear() ?></td>
      <td><?php echo $Game->getPlatform() ?></td>
      <td><?php echo $Game->getUserId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mrGame/new') ?>">New</a>
