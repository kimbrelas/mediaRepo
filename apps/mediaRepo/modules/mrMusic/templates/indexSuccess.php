<h1>Music List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Artist</th>
      <th>User</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Music as $Music): ?>
    <tr>
      <td><a href="<?php echo url_for('mrMusic/show?id='.$Music->getId()) ?>"><?php echo $Music->getId() ?></a></td>
      <td><?php echo $Music->getName() ?></td>
      <td><?php echo $Music->getMedium() ?></td>
      <td><?php echo $Music->getYear() ?></td>
      <td><?php echo $Music->getArtist() ?></td>
      <td><?php echo $Music->getUserId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mrMusic/new') ?>">New</a>
