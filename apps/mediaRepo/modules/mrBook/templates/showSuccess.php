<h1><?php echo $book->name ?></h1>

<table>
  <tbody>
    <tr>
      <th>Medium:</th>
      <td><?php echo $book->medium ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $book->year ?></td>
    </tr>
    <tr>
      <th>Author:</th>
      <td><?php echo $book->author ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('books_edit', $book) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('books') ?>">List</a>
