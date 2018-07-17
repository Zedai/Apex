<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>
      ID/Name Database
    </title>
     <h1>ID/Name Database</h1>
  </head>

  <body>

    <?php
    function display(){
      // $query = "SELECT * FROM test";
      // $result = mysqli_query($conn, $query);
      // echo "<table style='width:100%'>";
      //
      // echo "<tr>";
      // echo "<th>ID</th>";
      // echo "<th>NAME</th>";
      // echo "</tr>";
      // while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      //   echo "<tr>";
      //   echo "<td>";
      //   echo $row["idtest"];
      //   echo "</td>";
      //   echo "<td>";
      //   echo $row["testname"];
      //   echo "</td>";
      //   echo "</tr>";
      // }
      // echo "</table>";

    }
    ?>

    <script>
    function validate() {
      if(!document.getElementById('id').value){
        alert("Enter an ID");
        return false;
      }
      if(!document.getElementById('name').value){
        alert("Enter a Name");
        return false
      }

      return true;
    }
    </script>

    <form method = "POST" action="<?php $_SERVER["PHP_SELF"] ?>" onsubmit="return validate();">

       <label>Test ID: </label>
       <input placeholder = "Enter your ID" type="text" id = "id" name = "id" required>
       <br>
       <label>Test Name: </label>
       <input placeholder = "Enter your name" type="text" id = "name" name = "name" required>
       <br>
       <input type = "submit" name = "sub" id = "sub" value = "Enter"/>
     </form>
     <?php

     $conn = mysqli_connect('dev04.apextsi.com', 'saikiran', 'sai@04', 'saikiran');
     if(!$conn){
          echo("Connection Error");
     }
     else{
       // echo "CONNECTED<br>";

     }

     if($_POST){
       $name = $_POST['name'];
       $id = $_POST['id'];
       // printf("your name is %s and your id is %d\n", $name, $id);
       // echo "<br>";
       if(!mysqli_query($conn, "INSERT INTO test (idtest, testname) VALUES ($id, '$name')")){
         printf("query didn't work");

       }
       else{
         // printf("query worked");
       }
     }

     // display();
     $query = "SELECT * FROM test";
     $result = mysqli_query($conn, $query);
     echo "<table style='width:100%'>";

     echo "<tr>";
     echo "<th>ID</th>";
     echo "<th>NAME</th>";
     echo "</tr>";
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       echo "<tr>";
       echo "<td>";
       echo $row["idtest"];
       echo "</td>";
       echo "<td>";
       echo $row["testname"];
       echo "</td>";
       echo "</tr>";
     }
     echo "</table>";


     ?>
     <br><br>
       <form method = "POST" action="<?php if(false)mysqli_query($conn, "DELETE FROM test")?>" >
          <input type="submit" value="Delete All!" onclick="return confirm('Are you sure you want delete all entries?')">
      </form>

     <?php
        mysqli_close($conn);
     ?>
  </body>
</html>
