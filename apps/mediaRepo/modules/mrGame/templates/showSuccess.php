<h1><?php echo $game->name ?></h1>
<table>
  <tbody>
    <tr>
      <th>Medium:</th>
      <td><?php echo $game->medium ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $game->year ?></td>
    </tr>
    <tr>
      <th>Platform:</th>
      <td><?php echo $game->platform ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for($base_route.'_edit', $game) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for($base_route) ?>">List</a>
