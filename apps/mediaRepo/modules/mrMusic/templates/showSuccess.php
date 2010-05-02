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
    <tr>
    	<th>Songs:</th>
    	<td>
    		<ul id="sortable">
	    		<?php foreach($music->Songs as $song): ?>
	    			<li id="<?php echo $song->id; ?>"><?php echo link_to('X', url_for('songs_'.$status.'_delete', $song), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?> <?php echo $song->name; ?></li>
	    		<?php endforeach; ?>
	    	</ul>
    		<a href="<?php echo url_for($base_route.'_addSong', $music) ?>">Add Song</a>
    	</td>
    </tr>
</table>

<hr />

<a href="<?php echo url_for($base_route.'_edit', $music) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for($base_route) ?>">List</a>

<script type="text/javascript">
	$(function() {
		$("#sortable").sortable({
			update: function(event, ui) {
				$.post(
					"<?php echo url_for($base_route.'_orderSongs', $music) ?>",
					{ songs: $('#sortable').sortable('toArray') }
				);	
			}
		});
		$("#sortable").disableSelection();
	});
</script>
