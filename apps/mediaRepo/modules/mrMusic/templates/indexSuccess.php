<?php slot('title') ?>Music <?php echo $status ?><?php end_slot(); ?>

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
      <td><a href="<?php echo url_for($base_route.'_show', $music) ?>"><?php echo $music->name ?></a></td>
      <td><?php echo $music->medium ?></td>
      <td><?php echo $music->year ?></td>
      <td><?php echo $music->artist ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<br />
<a href="<?php echo url_for($base_route.'_new') ?>">Add Music</a>
