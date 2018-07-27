<html>
<div class="container1">
<button class="test">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
<div><input type="text" name="mytext[]"></div>
</div>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
// $(document).ready(function() {
    var wrapper         = $(".container1");
    var add_button      = $(".test");

    $(add_button).click(
      function(e){
        e.preventDefault();
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
    }
  );

    $(wrapper).on("click",".delete",
    function(e){
        e.preventDefault(); $(this).parent('div').remove();
    }
  )
// });
</script>
