document.getElementById("password").onkeyup = check;

function check() {
  createScript();
  var password = document.getElementById("password").value;
  alert(password);
}

function createScript() {
  const script = document.createElement("script");

  // use local file
  // script.src = 'script.js';

  script.src =
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js";

  script.async = true;

  // make code in script to be treated as JavaScript module
  // script.type = 'module';

  script.onload = () => {
    console.log("Script loaded successfuly");
    const box = document.getElementById("box");
    box.textContent = "The script JQuery.min.js has loaded.";
  };

  script.onerror = () => {
    console.log("Error occurred while loading script");
  };

  document.body.appendChild(script);
}
/*document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("password").addEventListener("keyup", check);
});*/
