// Ovdje dođe javascript zajednički za cijelu aplikaciju
$(document).foundation();

$("a.button").click(function(){
    $.ajax({
        url: '/index/countImages', 
        success: function(result){
      $("#countNumber").html(result);
    }});
  });