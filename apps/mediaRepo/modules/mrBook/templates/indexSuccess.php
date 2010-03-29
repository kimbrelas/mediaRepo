<h1>Your Books</h1>

<table>
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
      <td><a href="<?php echo url_for('books_show', $book) ?>"><?php echo $book->name ?></a></td>
      <td><?php echo $book->medium ?></td>
      <td><?php echo $book->year ?></td>
      <td><?php echo $book->author ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('books_new') ?>">Add Book</a>