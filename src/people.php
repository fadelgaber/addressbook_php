<link rel="stylesheet" type="text/css" href="style.css">
<?php
include('database/DatabaseConnection.php');
//SQL query is here
$sql   = "Select *
          From people";
$sql2  = "Select * From organisations";
$query = $DB->prepare($sql);

if ($query->execute() === FALSE) {
    die('Error Running Query: ' . implode($query->errorInfo(), ' '));
}

$result = $query->fetchAll();
$query2 = $DB->prepare($sql2);
$query2->execute();
$orglist = $query2->fetchAll();
//Table generation starts below
?>

    <table>
    <tr>
    <th>ID</th><th>Name</th><th>Phone</th><th>Organisation</th><th colspan="2">Action</th>
    </tr>

<?php
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['organisation'] . "</td>";
    echo "<td>" . "<a href='editpeople.php?id=" . $row['id'] . "'>" . "Edit" . "</a>" . "</td>";
    echo "<td>" . "<a href='deletepeople.php?id=" . $row['id'] . "'>" . "Delete" . "</a>" . "</td>";
    echo "</tr>";
}
?>

</table>
<br><br>
<table>
   <tr>
      <th>Add new </th>
   </tr>
   <tr>
      <form method="GET" action="/people/test/test">
         <td><label>Name:</label><input type="text" name="name" required></td>
   </tr>
   <tr>
   <td><label>Phone:</label><input type="text" name="phone" required></td>
   </tr>
   <tr>
   <td><label>Organisation:
   <Select name="org">
   <?php
      foreach ($orglist as $row) {
      echo "<option value='" . $row['ID'] . "'>" . $row['name'];
	  }
      ?>
   </Select></td>
   </tr>
   <tr><td><input type="submit" name="add"></td></tr>
   </form>    
</table>