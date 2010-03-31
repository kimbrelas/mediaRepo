<table width="100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Artist</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($musics as $music): ?>
    <tr>
      <td><a href="<?php echo url_for('music_show', $music) ?>"><?php echo $music->name ?></a></td>
      <td><?php echo $music->medium ?></td>
      <td><?php echo $music->year ?></td>
      <td><?php echo $music->artist ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<br />
<a href="<?php echo url_for('music_new') ?>">Add Music</a>