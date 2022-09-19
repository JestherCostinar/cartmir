
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
        $("#addToCartBtn").hide();
        $("#inputDiv").show();
        $("#countOfProductInCart").text(jsonData.count);
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
      // alert(response);
      const jsonData = JSON.parse(response);
      if (jsonData.status == "success") {
        $("#addCount").val(jsonData.qty);
        $("#addToCartBtn").hide();
        $("#inputDiv").show();
      } else {
        $("#addToCartBtn").show();
        $("#inputDiv").hide();
      }
    },
  });
}