
const baseUrl = "http://localhost:8080/";
function addToCart(productID, price, userID) {
  $.ajax({
    url: baseUrl + "addToCart",
    type: "POST",
    data: { productID: productID, price: price, userID: userID },
    success: function (response) {
      console.log(response);
      const jsonData = JSON.parse(response);
      if (jsonData.status == "success") {
        $("#addCount").val(jsonData.qty);
        $("#addCount_" + productID).val(jsonData.qty);
        $("#addToCartBtn").hide();
        $("#inputDiv").show();
        $("#countOfProductInCart").text(jsonData.count);
        $("#subTotal").text(jsonData.subTotal.toLocaleString("en-US") + '.00');
        $("#totalItemPrice").text(jsonData.totalPrice.toLocaleString("en-US") + ".00");
        $("#totalDiscount").text(jsonData.totalDiscount);
      } else {
        // Statement
      }
    },
  });
}

// Decrement product in cart
function minus(productID, userID) {
  $.ajax({
    url: baseUrl + "decrement", //Decrement product quantity in cart
    type: "POST",
    data: { productID: productID, userID: userID },
    success: function (response) {
      const jsonData = JSON.parse(response);

      $("#subTotal").text(jsonData.subTotal.toLocaleString("en-US") + ".00");
      $("#totalItemPrice").text(jsonData.totalPrice.toLocaleString("en-US") + ".00");
      $("#totalDiscount").text(jsonData.totalDiscount);
      // alert(response);
      if (jsonData.status == "success") {
        $("#addCount").val(jsonData.qty);
        $("#addCount_" + productID).val(jsonData.qty);
        $("#addToCartBtn").hide();
        $("#inputDiv").show();
      } else {
        $("#productRow_" + productID).html('');
        $("#middleborder_" + productID).hide('');
        $("#middlebordertop_" + productID).hide("");
        $("#countOfProductInCart").text(jsonData.count);
        $("#addToCartBtn").show();
        $("#inputDiv").hide();
      }
    },
  });
}

// Decrement product in cart
function removeItem(productID, userID, cartID) {
  $.ajax({
    url: baseUrl + "removeItem", //Decrement product quantity in cart
    type: "POST",
    data: { cartID: cartID, userID: userID },
    success: function (response) {
      // alert(response);
      const jsonData = JSON.parse(response);
      if (jsonData.status == "success") {
        $("#productRow_" + productID).html("");
        $("#middleborder_" + productID).hide("");
        $("#middlebordertop_" + productID).hide("");
      } else {
      }
    },
  });
}