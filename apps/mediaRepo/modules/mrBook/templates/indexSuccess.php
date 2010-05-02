<?php slot('title') ?>Books <?php echo $status ?><?php end_slot(); ?>

<table width="100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Medium</th>
      <th>Year</th>
      <th>Author</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($books as $book): ?>
    <tr>
      <td><a href="<?php echo url_for($base_route.'_show', $book) ?>"><?php echo $book->name ?></a></td>
      <td><?php echo $book->medium ?></td>
      <td><?php echo $book->year ?></td>
      <td><?php echo $book->author ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<br />
<a href="<?php echo url_for($base_route.'_new') ?>">Add Book</a>
