<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <link rel="stylesheet" type="text/css" href="form.css">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <title>
      Javascript Form
    </title>
     <h1>Javascript Form</h1>
  </head>

  <body>

    <?php
    include("companyfunct.php");
    include("db_connect.php");
    // echo test();
    // $conn = mysqli_connect('dev04.apextsi.com', 'saikiran', 'sai@04', 'saikiran');
    // if(!$conn){
    //      echo("Connection Error");
    // }
    // else{
    //   // =echo "CONNECTED<br>";
    //
    // }

    ?>

    <script>
    function validate() {
      // alert('test');
//      alert(""+document.getElementByID("date".value));

      if(document.getElementById("name").value && document.getElementById("date").value){
        // var name = document.getElementById('name').value;
        // var type = document.getElementById('type').value;
        // var date = document.getElementById('date').value;
        // var desc = document.getElementById('desc').value;

        <?php
            $name = $_POST['name'];
             $type = $_POST['Type'];
             $date = $_POST['date'];
             $desc = $_POST['desc'];
             $d = $_POST['d'];
             // if($name = "")
             //  $name = null;
             // if($type = "")
             //  $type = null;
         ?>
        var padd = "<?php compInsert($name, $type, $date, $desc, $d);?>"; // call function to insert value0
        return true;
      }
      else {
        return false;
      }

    }

    function alertTest(){
      alert('it works');
    }

    </script>

    <!-- <var>count</var> = 200; -->
    <form id = 'form' method = 'POST' action='<?php $_SERVER['PHP_SELF'] ?>' onsubmit='return validate();'>
      <fieldset>
        <legend>Company Entry:</legend>
       <label>Company Name: </label>
       <input placeholder = 'Enter the name of your company...' type='text' id = 'name' name = 'name' maxlength='90' required>
       <br>
       <label>Company Type: </label>
       <select id = 'type' name='Type' required>
        <?php
       
        $query = 'SELECT * FROM look_values';
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $field = $row['look_values'];
          echo '<option>$field</option>';
        }
         ?>
       </select>
       <label>Date Opened: </label>
       <input type='text' id = 'datepicker' name='datepicker' required>
        <script>
         $(function() {
          $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
          });
        </script>

       <br>
       <label>Company Description: </label>
       <textarea placeholder = 'What does your company do?' type='text' id = 'desc' name='desc' maxlength='200' onkeypress='keyCount()'></textarea>
       <br>
       <p id='insert'></p>
       <fieldset id = 'd[]' name = 'd[]'>
          <legend>Departments:</legend>
          <input type = 'text' name = 'd[]' id = 'd[]' placeholder = 'Department 0'> <br>
          <p id='newdept'></p>
          <!-- <input type = "text" id = "d_1"> <br>
          <input type = "text" id = "d_2"> <br>
          <input type = "text" id = "d_3"> -->
          <button type = 'button' id = 'new' onclick='add()'>Add</button>
          <p id='remove'></p>
       </fieldset>
       <input type = 'submit' name = 'sub' id = 'sub' value = 'Enter'/>
     </fieldset>

     </form>


     <script>
     var data = new Array();
     var dept = 1;
     var remove_html = "<button type = 'button' id = 'del' onclick='remove()''>Remove</button>";
     function addIter(){
       // document.write("<input type = 'text' form = 'form' name = 'd0' id = 'd0'> <br>");
       // var id = "d[" + dept + "]";
       // var html = "<input type = 'text' name = '" + id +"' id = '" +id+"' placeholder = 'Department " + dept+"'> <br>";
       var html = "";
       if(data[dept]){
         html = "<input type = 'text' class = 'dynamic' name = 'd[]' id = 'd[]' placeholder = 'Department " + dept+"' value = '"+ data[dept] +"'> <br>";
       }
       else{
         html = "<input type = 'text' class = 'dynamic' name = 'd[]' id = 'd[]' placeholder = 'Department " + dept+"'> <br>";
       }
       document.getElementById("newdept").innerHTML = document.getElementById("newdept").innerHTML + html;
       // var ref = document.getElementById("d["+(dept - 1) +"]");
       // data[dept - 1] = ref.value;
       dept++;

     }
     function add(){
       saveState();
       document.getElementById("newdept").innerHTML = "";
       var temp = dept;
       dept = 1;
       for(var i = 0; i < temp; i++){
         addIter();
       }
       check();

     }

     function remove(){
       saveState();
       var temp = dept;
       data[dept-1] = null;
       document.getElementById("newdept").innerHTML = "";
       dept = 1;

       for(var i = 2; i<temp;i++){  //i = 2 because dept is for department number placeholders. If dept = 1 that means no fields have beein inserted dynamically.
         add();
       }

       check();
     }

     function saveState(){
       for(var j = 0; j < dept; j++){
         // var x = document.getElementById("d["+(j)+"]");
         var ref = document.getElementsByClassName("dynamic");
         var x =ref[j];
        try {
          data[j + 1] = x.value;
        }
        catch(err) {
          // data[j] = err;
          // alert(err);
          // alert(data);
        }
       }
     }

     function check(){
       if(dept > 1){
         document.getElementById("remove").innerHTML = remove_html;
       }
       else {
         document.getElementById("remove").innerHTML = "";
       }
     }
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

     ?>
     <?php
        mysqli_close($conn);
     ?>
  </body>
  <footer align="center">
    <font color="gray">Saikiran Nakka</font>
  </footer>
</html>
