document.getElementById("password").onkeyup = check;

function check() {
  var password = document.getElementById("password").value;
  alert(password);
}

/*document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("password").addEventListener("keyup", check);
});*/
