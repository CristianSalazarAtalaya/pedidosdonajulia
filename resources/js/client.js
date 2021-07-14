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

  var listProducts = [];

  class Product {
    constructor(productId, product, price, cantidad) {
      this.productId = productId;
      this.product = product;
      this.price = price;
      this.cantidad = cantidad;
    }
  }

  function calularTotales(listProducts) {
    let a = 0;
    a = listProducts.reduce(function (accumulator, currentValue) {
      return accumulator + currentValue.cantidad * currentValue.price;
    }, 0);
    return a;
  }

  function generarTablaResumen(listProducts) {
    document.getElementById("tablecomprasbody").innerHTML = "";
    var total = calularTotales(listProducts);

    for (i = 0; i < listProducts.length; i++) {
      let thisProduct = listProducts[i];
      let subTotal = listProducts[i].price * listProducts[i].cantidad;

      let htmlToAdd =
        "<tr><th scope='row'>" +
        (i + 1) +
        "</th><td>" +
        listProducts[i].productId +
        "</td><td>" +
        listProducts[i].product +
        "</td><td>" +
        listProducts[i].price +
        "</td><td>" +
        listProducts[i].cantidad +
        "</td><td>" +
        subTotal +
        "</td><td> + - </td></tr>";

      document.getElementById("tablecomprasbody").innerHTML += htmlToAdd;
    }
    let htmlToAdd =
      "<tr><th scope='row'>" +
      (listProducts.length + 1) +
      "</th><td>-</td><td>Total</td><td>-</td><td>-</td><td>" +
      total +
      "</td><td>-</td></tr>";
    document.getElementById("tablecomprasbody").innerHTML += htmlToAdd;
  }

  $(".addToCar").click(function () {
    var productId = parseInt($(this).attr("data-id-product"));
    var product = $(this).attr("data-product");
    var price = $(this).attr("data-price");

    let productObj = new Product(productId, product, price, 1);

    const result = listProducts.filter((word) => word.productId == productId);

    if (listProducts.length == 0) {
      listProducts.push(productObj);
    } else {
      if (result >= -1) {
        listProducts.push(productObj);
      } else {
        const indiceProduct = listProducts.findIndex(
          (word) => word.productId == productId
        );

        listProducts[indiceProduct] = result[0];
        listProducts[indiceProduct].cantidad =
          listProducts[indiceProduct].cantidad + 1;
        // console.log(listProducts[indiceProduct]);
      }
    }
    console.log(listProducts);
    generarTablaResumen(listProducts);
    // var total = calularTotales(listProducts);

    // console.log(listProducts);
  });
});

//Rectangle.name
