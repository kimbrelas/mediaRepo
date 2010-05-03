<table width="100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Platform</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($games as $game): ?>
    <tr>
      <td><a href="<?php echo url_for($base_route.'_show', $game) ?>"><?php echo $game->name ?></a></td>
      <td><?php echo $game->medium ?></td>
      <td><?php echo $game->year ?></td>
      <td><?php echo $game->platform ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<br />
<a href="<?php echo url_for($base_route.'_new') ?>">Add Game</a>
