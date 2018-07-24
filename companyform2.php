<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>
      Company Form
    </title>
     <h1>Company Form</h1>
  </head>

  <body>

    <!-- <var>count</var> = 200; -->
    <form method = "POST" action="redirect.php" >
      <fieldset>
        <legend>Company Entry:</legend>
       <label>Company Name: </label>
       <input placeholder = "Enter the name of your comapny..." type="text" id = "name" name = "name" maxlength="90" required>
       <br>
       <label>Company Type: </label>
       <select name="Type" required>
        <option value="corp">corp</option>
        <option value="s-corp">s-corp</option>
        <option value="private">private</option>
        <option value="public">public</option>
       </select>
       <label>Date Opened: </label>
       <input type="date" name="date" required>
       <br>
       <label>Company Description: </label>
       <textarea placeholder = "What does your company do?" type="text" id = "desc" name="desc" maxlength="200" onkeypress="keyCount()"></textarea>
       <br>
       <p id="insert"></p>
       <input type = "submit" name = "sub" id = "sub" value = "Enter"/>
     </fieldset>
     </form>

     <script>
      function keyCount(){
        // alert('test');
        var count = 200 - document.getElementById("desc").value.length;
        document.getElementById("insert").innerHTML = count + " characters left";
      }
     </script>

     <?php


     // if($_POST){
     //   $name = $_POST['name'];
     //   $type = $_POST['Type'];
     //   $date = $_POST['date'];
     //   $desc = $_POST['desc'];
     //   // $_POST = NULL;
     //   // printf("your name is %s and your id is %d\n", $name, $id);
     //   // echo "<br>";
     //   if(!mysqli_query($conn, "INSERT INTO company (companyname, company_type, date_opened, company_desc) VALUES ('$name', '$type', '$date', '$desc')")){
     //     printf("query didn't work");
     //     echo"<br>";
     //     echo("Error description: " . mysqli_error($conn));
     //   }
     //   else{
     //     // printf("query worked");
     //   }
     //
     // }

     // display();


     $conn = mysqli_connect('dev04.apextsi.com', 'saikiran', 'sai@04', 'saikiran');

     $query = "SELECT * FROM company";
     $result = mysqli_query($conn, $query);
     echo "<table style='width:100%'>";

     echo "<tr>";
     echo "<th>NAME</th>";
     echo "<th>TYPE</th>";
     echo "<th>DATE</th>";
     echo "<th>DESC</th>";
     echo "</tr>";
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       echo "<tr>";
       echo "<td>";
       echo $row["companyname"];
       echo "</td>";
       echo "<td>";
       echo $row["company_type"];
       echo "</td>";
       echo "<td>";
       echo $row["date_opened"];
       echo "</td>";
       echo "<td>";
       echo $row["company_desc"];
       echo "</td>";
       echo "</tr>";
     }
     echo "</table>";

        mysqli_close($conn);
     ?>
  </body>
  <footer align="center">
    <font color="gray">Saikiran Nakka</font>
  </footer>
</html>
