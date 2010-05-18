<h1><?php echo $movie->name ?></h1>
<table>
  <tbody>
    <tr>
      <th>Medium:</th>
      <td><?php echo $movie->medium ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $movie->year ?></td>
    </tr>
    <tr>
      <th>Format:</th>
      <td><?php echo $movie->format ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for($base_route.'_edit', $movie) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for($base_route) ?>">List</a>
