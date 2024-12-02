<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$lookup = htmlentities($_GET['lookup'],ENT_QUOTES,'utf-8');
if($lookup == 'cities'){

  $country = htmlentities($_GET['country'],ENT_QUOTES,'utf-8');
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries INNER JOIN cities ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table class='tbl2'>
  <tr>
  <th>Name</th>
  <th>District</th>
  <th>Population</th>
  </tr>";


}
else{
$country = htmlentities($_GET['country'],ENT_QUOTES,'utf-8');
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>";
}
?>


<ul>

<?php 
if($lookup != 'cities'){
foreach ($results as $row): ?>
  
  <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['continent']; ?></td>
      <td><?= $row['independence_year']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
 </tr>
<?php endforeach; }?>
</ul>

<ul>
<?php 
if($lookup == 'cities'){
foreach ($results as $row): ?>
  <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['district']; ?></td>
      <td><?= $row['population']; ?></td>

 </tr>
<?php endforeach; }?>
</ul>

