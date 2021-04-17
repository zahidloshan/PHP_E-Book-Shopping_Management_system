function validateForm() {
  var bookid = document.getElementById("bId").value;
  var bprice = document.getElementById("bPrice").value;
  var bquantity = document.getElementById("bQuantity").value;
  if (bookid == "") {
    document.getElementById("mytext").innerHTML="Please enter Book Id";
    return false;
  }

  if (bquantity  == "") {
    document.getElementById("mytext").innerHTML="Please enter Quantity ";
    return false;
  }
  if (bprice == "") {
    document.getElementById("mytext").innerHTML="Please enter Price ";
    return false;
  }
}