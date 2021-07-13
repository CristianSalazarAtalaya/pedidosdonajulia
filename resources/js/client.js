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

  var myModal = document.getElementById("myModal");
  var myInput = document.getElementById("myInput");

  myModal.addEventListener("shown.bs.modal", function () {
    myInput.focus();
  });
});
