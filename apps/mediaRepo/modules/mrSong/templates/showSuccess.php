<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $song->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $song->getName() ?></td>
    </tr>
    <tr>
      <th>Album:</th>
      <td><?php echo $song->getAlbumId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('mrSong/edit?id='.$song->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('mrSong/index') ?>">List</a>
