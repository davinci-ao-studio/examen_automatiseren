<table class="table table-striped">
  <thead>
    <tr>
      <th>Naam</th>
      <th>OV nummer</th>
      <th>Acties</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($students as $student): ?>
    <tr>
      <td><?= $student['first_name'] . " " . $student['last_name'] ?></td>
      <td><?= $student['ov_number'] ?></td>
      <td>
        <a href="#">
          <span class="glyphicon">&#xe014;</span>
        </a> <a href="#">Wijzig</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>