// Ovdje dođe javascript zajednički za cijelu aplikaciju
$(document).foundation();

$("button").click(function(){
    $.ajax({
        url: '/management/countImages', 
        success: function(result){
      $("#countNumber").html(result);
    }});
  });