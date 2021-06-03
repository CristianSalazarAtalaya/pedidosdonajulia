$(function () {
  // your code goes here

  //$("#bfCaptchaEntry").click(myFunction);

  $("#mainFilterCategory").change(function () {
    $(".filterCategory ").css("display", "none");
    $("." + $(this).val()).css("display", "block");
  });
});
