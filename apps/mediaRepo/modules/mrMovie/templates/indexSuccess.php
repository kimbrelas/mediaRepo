<h1>Your Movies</h1>

<table>
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
      <td><a href="<?php echo url_for('movies_show', $movie) ?>"><?php echo $movie->name ?></a></td>
      <td><?php echo $movie->medium ?></td>
      <td><?php echo $movie->year ?></td>
      <td><?php echo $movie->format ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('movies_new') ?>">Add Movie</a>