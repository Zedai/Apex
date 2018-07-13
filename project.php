<html>
  <head>
    <title>
      This is a Test Website
    </title>
  </head>

  <body>
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

    <form method = "POST" action="insert.php" onsubmit="return validate();">

       <label>Test ID: </label>
       <input placeholder = "Enter your ID" type="text" id = "id" name = "id"/>

       <label>Test Name: </label>
       <input placeholder = "Enter your name" type="text" id = "name" name = "name"/>

       <input type = "submit" name = "sub" id = "sub" value = "Enter"/>
     </form>
  </body>
</html>
