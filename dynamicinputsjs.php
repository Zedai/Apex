<html>
<div class="departments">
<button class="add_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
<div><input type="text" id = "t_0" name="mytext[]"></div>
</div>
<form>
<input type = "button" id = "disp" onclick"display()" value= "Display">
</form>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
// $(document).ready(function() {
    var wrapper         = $(".departments");
    var add_button      = $(".add_field");
    var x = 1;
    $(add_button).click(
      function(e){
        e.preventDefault();
        x++;
            $(wrapper).append('<div><input type="text" id = "t_1" name="mytext[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
    }
  );

    $(wrapper).on("click",".delete",
    function(e){
        e.preventDefault();
        $(this).parent('div').remove();
          x--;
    }
  );

  document.getElementById("disp").onclick = display;
  function display(){
    // var string = "";
    // var i;
    // for(i = 0; i < 2; i++)
    //   string += document.getElementById("t_'+i+'").value + " ";
    var string = "";
    alert(document.getElementById("t_1").value);
  };

  // document.write()
// });
</script>
