<?php

$hostname = "localhost";
$username = "root";
$password = '';
$databaseName = "bim";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `dep_ag`";
$result1 = mysqli_query($connect, $query);

if(!empty($_POST["idStock"])) 
{
 $id=intval($_POST['idStock']);
$query=mysqli_query($con,"SELECT * FROM stock_cur WHERE idStock=$id");
?>
<option value="">Select Country</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['country']); ?></option>
  <?php
 }
}
?>