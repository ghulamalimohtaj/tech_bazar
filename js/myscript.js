
$(document).ready(function(){
  $("#search-trigger").click(function(){
    $("#search-form").toggle();
  });
  $("#fireShow").click(function(){
      $("#showableSearch").slideToggle();
  });
  $("#showNewPc").click(function(){
      $("#newPc").animate({
          height:'toggle'
      });
  });
  $("#market").click(function(){
     $("#user").fadeToggle("slow");
  });
});