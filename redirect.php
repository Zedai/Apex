<?php
$conn = mysqli_connect('dev04.apextsi.com', 'saikiran', 'sai@04', 'saikiran');

$name = $_POST['name'];
$type = $_POST['Type'];
$date = $_POST['date'];
$desc = $_POST['desc'];
// document.getElementById("form").reset();

// var frm=document.getElementByID('form');
// frm.reset();

// $_POST = NULL;
// printf("your name is %s and your id is %d\n", $name, $id);
// echo "<br>";
if(!mysqli_query($conn, "INSERT INTO company (companyname, company_type, date_opened, company_desc) VALUES ('$name', '$type', '$date', '$desc')")){
  printf("query didn't work");
  echo"<br>";
  echo("Error description: " . mysqli_error($conn));
}
else{
  // printf("query worked");
  // header("Location: companyform.php");
  // exit;
  // die;
}
header("Location: companyform2.php");
die();
?>
