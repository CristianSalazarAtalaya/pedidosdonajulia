var listProducts = [];

class Product {
  constructor(productId, product, price, cantidad) {
    this.productId = productId;
    this.product = product;
    this.price = price;
    this.cantidad = cantidad;
  }
}
function generarTablaResumen(listProducts) {
  document.getElementById("tablecomprasbody").innerHTML = "";
  var total = calularTotales(listProducts);

  for (i = 0; i < listProducts.length; i++) {
    let thisProduct = listProducts[i];
    let subTotal = listProducts[i].price * listProducts[i].cantidad;

    var btnAdd =
      "<a onclick='addProduct(this)' class='btn btn-primary addToCar'data-id-product='" +
      listProducts[i].productId +
      "' data-product='" +
      listProducts[i].product +
      "' data-price='" +
      listProducts[i].price +
      "'>+</a>";
    var btnRes =
      "<a onclick='resProduct(this)' class='btn btn-danger addToCar'data-id-product='" +
      listProducts[i].productId +
      "' data-product=" +
      listProducts[i].product +
      "' data-price='" +
      listProducts[i].price +
      "'>-</a>";
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
      "</td><td>" +
      btnAdd +
      btnRes +
      "</td></tr>";

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
function calularTotales(listProducts) {
  let a = 0;
  a = listProducts.reduce(function (accumulator, currentValue) {
    return accumulator + currentValue.cantidad * currentValue.price;
  }, 0);
  return a;
}

function addProduct(param) {
  var productId = parseInt($(param).attr("data-id-product"));
  var product = $(param).attr("data-product");
  var price = $(param).attr("data-price");
  let productObj = new Product(productId, product, price, 1);
  const result = listProducts.filter((word) => word.productId == productId);
  if (listProducts.length == 0) {
    listProducts.push(productObj);
  } else {
    if (result == "") {
      listProducts.push(productObj);
    } else {
      const indiceProduct = listProducts.findIndex(
        (word) => word.productId == productId
      );
      listProducts[indiceProduct] = result[0];
      listProducts[indiceProduct].cantidad =
        listProducts[indiceProduct].cantidad + 1;
    }
    generarTablaResumen(listProducts);
  }
}
function resProduct(param) {
  var productId = parseInt($(param).attr("data-id-product"));
  var product = $(param).attr("data-product");
  var price = $(param).attr("data-price");
  let productObj = new Product(productId, product, price, 1);
  const result = listProducts.filter((word) => word.productId == productId);

  if (listProducts.length > 0) {
    if (result != "") {
      const indiceProduct = listProducts.findIndex(
        (word) => word.productId == productId
      );

      listProducts[indiceProduct] = result[0];

      let cantidadActual = listProducts[indiceProduct].cantidad - 1;

      if (cantidadActual > 0) {
        listProducts[indiceProduct].cantidad = cantidadActual;
      } else {
        listProducts.splice(indiceProduct, 1);
      }
    }
  }
  generarTablaResumen(listProducts);
}
$(document).ready(function () {
  // your code goes here
  $("#mainFilterCategory").change(function () {
    if ($(this).val() == "Categoria") {
      $(".filterCategory ").css("display", "block");
    } else {
      $(".filterCategory ").css("display", "none");
      $("." + $(this).val()).css("display", "block");
    }
  });

  $(".addToCar").on("click", function () {
    addProduct(this);
  });

  $("#limpiarcarrito").click(function () {
    listProducts = [];
    document.getElementById("tablecomprasbody").innerHTML = "";
  });
  $("#realizarcompra").click(function () {
    jsonData = '{ "data" : ' + JSON.stringify(listProducts) + "}";
    //jsonData = '{ "data" : ' + JSON.stringify(listProducts) + "}";
    //jsonData = JSON.stringify(listProducts);
    const obj = JSON.parse(jsonData);
    console.log(obj);
    //console.log(json);
    // $.ajax({
    //   type: "POST",
    //   url: url,
    //   data: jsonData,
    //   success: function () {
    //     alert("asdad mrdd");
    //   },
    //   dataType: dataType,
    // });

    // var jqxhr = $.post("example.php", function () {
    //   alert("success");
    // })
    //data.append("params", jsonData);
    console.log(jsonData);
    var jqxhr = $.post(
      "http://localhost/pedidosdonajulia/client/doBuyFromCar",
      obj
    )
      .done(function (data) {
        alert("Su código de pedido es: " + data);
      })
      .fail(function (data) {
        alert("error" + data);
      })
      .always(function () {
        alert("finished");
      });

    // $.ajax({
    //   type: "POST",
    //   url: "http://localhost/pedidosdonajulia/client/doBuyFromCar",
    //   dataType: "json",
    //   data: obj,
    //   success: function (data) {
    //     alert(data);
    //   },
    //   error: function (data) {
    //     alert("error!!" + data);
    //   },
    // });
  });
});
