<h1>Songs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Album</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($songs as $song): ?>
    <tr>
      <td><a href="<?php echo url_for('mrSong/show?id='.$song->getId()) ?>"><?php echo $song->getId() ?></a></td>
      <td><?php echo $song->getName() ?></td>
      <td><?php echo $song->getAlbumId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mrSong/new') ?>">New</a>
