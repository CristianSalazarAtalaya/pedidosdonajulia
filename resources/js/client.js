$(function () {
  // your code goes here

  //$("#bfCaptchaEntry").click(myFunction);

  $("#mainFilterCategory").change(function () {
    if ($(this).val() == "Categoria") {
      $(".filterCategory ").css("display", "block");
    } else {
      $(".filterCategory ").css("display", "none");
      $("." + $(this).val()).css("display", "block");
    }
  });

  $(".addToCar").click(function () {
    alert("Handler for .click() called.A SDASDASD");
  });
});
