<?php

function compInsert($name, $type, $date, $desc, $d){
  // $conn = mysqli_connect('dev04.requireapextsi.com', 'saikiran', 'sai@04', 'saikiran');
  require("db_connect.php");
  if(!($date == "0000-00-00" || ($name == null || $name == ""))){ //weird refresh bug
      if(""+mysqli_num_rows(mysqli_query($conn, "SELECT idcompany FROM company WHERE companyname = '$name'")) == "0"){
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

      $function = mysqli_fetch_assoc(mysqli_query($conn, "SELECT idcompany FROM company WHERE companyname = '$name'"));
	    $id = $function['idcompany'];

    for($i = 0; $i<count($d);$i++){
      if(""+mysqli_num_rows(mysqli_query($conn, "SELECT idcompany FROM company_dept WHERE idcompany = '$id' AND department = '$d[$i]'")) == "0" && !($d[$i] == null || $d[$i] == ""))
        mysqli_query($conn, "INSERT INTO company_dept (idcompany, department) VALUES ('$id', '$d[$i]')");
    }
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
