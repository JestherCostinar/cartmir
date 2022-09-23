
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

function addAddress() {
  const fullname = $('#fullname').val();
  const city = $("#city").val();
  const area = $("#area").val();
  const pincode = $("#pincode").val();
  const address = $("#address").val();
  const addressStr = `${fullname}${pincode}`;
  if (fullname == "") {
    alert("Please enter your name");
    return false;
  } else if (city == "") {
    alert("Please enter your city");
    return false;
  } else if (area == "") {
    alert("Please enter your area");
    return false;
  } else if (pincode == "") {
    alert("Please enter your pincode");
    return false;
  } else if (address == "") {
    alert("Please enter your address");
    return false;
  } else {
     $.ajax({
       url: baseUrl + "addShoppingAddress",
       type: "POST",
       data: {
         fullname: fullname,
         city: city,
         area: area,
         pincode: pincode,
         address: address,
       },
       success: function (response) {
        const jsonData = JSON.parse(response);
        // alert(response);
         if (jsonData.status == 'success') {
           $("#shippingAddressDiv").append(
             '<label> <input type="radio" name="shippingAddress" value="' +
               jsonData.lastInsertedID +
               '"> ' +
               addressStr +
               "</label><br>"
           );
         } else {
         }
       },
     });
  }
}

function proceedToPay() {
  if ($("input:radio[name='shippingAddress']").is(":checked")) {
    const deliveryAddress = $("input[name='shippingAddress']:checked").val();
    const paymentMethod = $("input[name='paymentMethod']:checked").val();

    if (paymentMethod === "COD") {
      $.ajax({
        url: baseUrl + "proceedToOrder",
        type: "POST",
        data: {
          deliveryAddress: deliveryAddress,
          paymentMethod: paymentMethod,
        },
        success: function (response) {
          const jsonData = JSON.parse(response);
          if (jsonData.status == "success") {
              window.location = baseUrl + "orderSuccess/" + jsonData.order_id;
          } else {
            console.log("asdas");
          }
        },
      });
    } 
  } else {
    alert("Please choose delivery address");
  }
}