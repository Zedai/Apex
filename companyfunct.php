<?php

function insert($name, $type, $date, $desc){
  // $conn = mysqli_connect('dev04.requireapextsi.com', 'saikiran', 'sai@04', 'saikiran');

  require("db_connect.php");
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

}

function test(){
  return "does this work";
}

// function insert(){
//   // $conn = mysqli_connect('dev04.apextsi.com', 'saikiran', 'sai@04', 'saikiran');
//
//   $name = $_POST['name'];
//   $type = $_POST['Type'];
//   $date = $_POST['date'];
//   $desc = $_POST['desc'];
//
//   if(!mysqli_query($conn, "INSERT INTO company (companyname, company_type, date_opened, company_desc) VALUES ('$name', '$type', '$date', '$desc')")){
//     printf("query didn't work");
//     echo"<br>";
//     echo("Error description: " . mysqli_error($conn));
//   }
//   else{
//     // printf("query worked");
//   }
//
//
// }

 ?>
