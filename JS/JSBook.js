function validateForm() {
  var bookname = document.getElementById("bookName").value;
  var bid = document.getElementById("bId").value;
  var bauthor = document.getElementById("bAuthor").value;
  var bpublisher = document.getElementById("bPublisher").value;
  var bedition = document.getElementById("bEdition").value;
  var bprice = document.getElementById("bPrice").value;
  var bquantity = document.getElementById("bQuantity").value;
  if (bookname == "") {
    document.getElementById("mytext").innerHTML="Please enter Book Title";
    return false;
  }
  if (bid == "") {
    document.getElementById("mytext").innerHTML="Please enter Book Id";
    return false;
  }
  if (bauthor == "") {
    document.getElementById("mytext").innerHTML="Please enter Author";
    return false;
  }
  if (bpublisher == "") {
    document.getElementById("mytext").innerHTML="Please enter Pulisher";
    return false;
  }
  if (bedition == "") {
    document.getElementById("mytext").innerHTML="Please enter Edition ";
    return false;
  }
  if (bprice == "") {
    document.getElementById("mytext").innerHTML="Please enter Price ";
    return false;
  }
  if (bquantity  == "") {
    document.getElementById("mytext").innerHTML="Please enter Quantity ";
    return false;
  }
  
}