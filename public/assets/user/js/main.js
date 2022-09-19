
const baseUrl = "http://localhost:8080/";
function addToCart(productID, price, userID) {
  $.ajax({
    url: baseUrl + "addToCart",
    type: "POST",
    data: { productID: productID, price: price, userID: userID },
    beforeSend: function () {
      $("#pleaseWait").text("Please Wait....");
    },
    complete: function () {
      $("#pleaseWait").text("");
    },
    success: function (response) {
      console.log(response);
      const jsonData = JSON.parse(response);
      if (jsonData.status == "success") {
         $("#addCount").val(jsonData.qty);
        $("#addToCartBtn").hide();
        $("#inputDiv").show();
      } else {
      }

      // if(response == 1) {
      //     $("#addToCartBtn").hide();
      //     $("#inputDiv").show();
      // } else {

      // }
    },
  });
}