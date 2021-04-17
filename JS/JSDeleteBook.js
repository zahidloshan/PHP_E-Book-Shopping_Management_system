function validateForm() {
  var bookid = document.getElementById("bId").value;
  if (bookid == "") {
    document.getElementById("mytext").innerHTML="Please enter Book Id";
    return false;
  }
}