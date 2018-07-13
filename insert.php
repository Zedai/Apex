<?php

$conn = mysqli_connect('dev04.apextsi.com', 'saikiran', 'sai@04', 'saikiran');
if(!$conn){
     echo("Connection Error");
}
else{
  echo "CONNECTED<br>";

  // printf("test");
}
$name = $_POST['name'];
$id = $_POST['id'];
printf("your name is %s and your id is %d\n", $name, $id);
echo "<br>";
if(!mysqli_query($conn, "INSERT INTO test (idtest, testname) VALUES ($id, '$name')")){
  printf("didn't work");

}
else{
  printf("query worked");
}


$query = "SELECT * FROM test"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn, $query);

// while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
//   printf ("%s %s\n",$row["idtest"],$row["testname"]);
//   echo "<br>";
// }


echo "<table style='width:100%'>"; // start a table tag in the HTML

echo "<tr>";
echo "<th>ID</th>";
echo "<th>NAME</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  echo "<tr>";
  // printf ("%s %s\n",$row["idtest"],$row["testname"]);
  echo "<td>";
  echo $row["idtest"];
  echo "</td>";
  echo "<td>";
  echo $row["testname"];
  echo "</td>";
  echo "</tr>";
}
echo "</table>";
// echo "<tr><td>" . $row['idtest'] . "</td><td>" . $row['testname'] . "</td></tr>";  //$row['index'] the index here is a field name
// while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
// }


// printf(TRUE);


// printf($_GET['input']);
// if(!mysqli_query($conn, "INSERT into test testname values "test"")){
//   printf("didn't work");
//
// }
// else{
//   printf("query worked");
// }
// printf(TRUE);

// mysqli_query($conn, "INSERT INTO test (testname) values ("this is a test")")
mysqli_close($conn);
?>
