<h1>Books List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Author</th>
      <th>User</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Books as $Book): ?>
    <tr>
      <td><a href="<?php echo url_for('mrBook/show?id='.$Book->getId()) ?>"><?php echo $Book->getId() ?></a></td>
      <td><?php echo $Book->getName() ?></td>
      <td><?php echo $Book->getMedium() ?></td>
      <td><?php echo $Book->getYear() ?></td>
      <td><?php echo $Book->getAuthor() ?></td>
      <td><?php echo $Book->getUserId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mrBook/new') ?>">New</a>
