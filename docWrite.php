<html>
  <body>
    <script>
    var today = new Date( );
    document.write("<p>Document accessed on: " + today.toString( ));
    document.write("<br>Document modified on: " + document.lastModified);
    // document.write("<br><button type = 'button' form = 'test' onclick = 'add()'>Add</button>");

    function add(){
      document.write("<br><br>");
      document.write("<input placeholder = 'Enter the name of your company...' type='text' id = 'name' form = 'test' name = 'name' maxlength='90' required>");
      document.write("<br><button type = 'button' form = 'test' onclick = 'add()'>Add</button>");
    }
    </script>

    <form id = "test">
      <button type = 'button' form = 'test' onclick = 'add()'>Add</button>
    </form>
  </body>
</html>
