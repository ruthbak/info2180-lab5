<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = isset($_GET['country']) ? $_GET['country']: '';

$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
$stmt->execute(['country'=>"%$country%"]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table border="1">
  <thead>
    <tr>
      <th>Country Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>
  </thead>
  <tbody>
    <?php if($results && count(results)>0): ?>
      <?php foreach ($results as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['continent']) ?></td>
          <td><?= htmlspecialchars($row['independence_year']) ?></td>
          <td><?= htmlspecialchars($row['head_of_state']) ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr?<td colspan="4"> No results found </td></tr>
    <?php endif; ?>
  </tbody>
</table>


