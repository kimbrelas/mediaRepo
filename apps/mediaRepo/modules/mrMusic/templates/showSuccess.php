<h1><?php echo $music->name ?></h1>
<table>
  <tbody>
    <tr>
      <th>Medium:</th>
      <td><?php echo $music->medium ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $music->year ?></td>
    </tr>
    <tr>
      <th>Artist:</th>
      <td><?php echo $music->artist ?></td>
    </tr>
</table>

<hr />

<a href="<?php echo url_for('music_edit', $music) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('music') ?>">List</a>
