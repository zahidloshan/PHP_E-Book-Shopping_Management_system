function validateForm() {
  var bookid = document.getElementById("dBookid").value;
  var bprice = document.getElementById("makeDiscount").value;
  if (bookid == "") {
    document.getElementById("mytext").innerHTML="Please enter Book Id";
    return false;
  }
  if (bprice == "") {
    document.getElementById("mytext").innerHTML="Please enter Price";
    return false;
  }
}