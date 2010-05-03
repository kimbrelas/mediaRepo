<table width="100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Format</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($movies as $movie): ?>
    <tr>
      <td><a href="<?php echo url_for($base_route.'_show', $movie) ?>"><?php echo $movie->name ?></a></td>
      <td><?php echo $movie->medium ?></td>
      <td><?php echo $movie->year ?></td>
      <td><?php echo $movie->format ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<br />
<a href="<?php echo url_for($base_route.'_new') ?>">Add Movie</a>
