// all custom JS will goes here
let clickedButtonAvailability = 1;

function menuLoad(param) {
  fetch("templates/menuAllItemLoader.php?param=" + param, {
    method: "GET",
  })
    .then((res) => res.text())
    .then((data) => {
      document.getElementById("menuMainContainer").innerHTML = data;
    })
    .then((err) => {
      err ? console.log(err) : "";
    });
}

function availableBtnColorChanger(event) {
  let button = event.target.id;

  if (button == "btn1") {
    document.getElementById("btn1").classList.add("btn-warning");
    document.getElementById("btn1").classList.add("text-dark");
    document.getElementById("btn1").classList.remove("btn-transparent");
    document.getElementById("btn1").classList.remove("text-white");

    document.getElementById("btn2").classList.add("btn-transparent");
    document.getElementById("btn2").classList.add("text-white");
    document.getElementById("btn2").classList.remove("btn-warning");
    document.getElementById("btn2").classList.remove("text-dark");

    clickedButtonAvailability = 1;
  } else if (button == "btn2") {
    document.getElementById("btn2").classList.add("btn-warning");
    document.getElementById("btn2").classList.add("text-dark");
    document.getElementById("btn2").classList.remove("btn-transparent");
    document.getElementById("btn2").classList.remove("text-white");

    document.getElementById("btn1").classList.add("btn-transparent");
    document.getElementById("btn1").classList.add("text-white");
    document.getElementById("btn1").classList.remove("btn-warning");
    document.getElementById("btn1").classList.remove("text-dark");

    clickedButtonAvailability = 2;
  }
}

try {
  setInterval(() => {
    if (clickedButtonAvailability == 1) {
      menuLoad("available");
    } else if (clickedButtonAvailability == 2) {
      menuLoad("unavailable");
    }
  }, 10000);
} catch (error) {}

try {
  document.addEventListener("DOMContentLoaded", () => {
    console.log("test")
    console.log(document.querySelectorAll(".item-add-from-menu-btn"));
  });
} catch (error) {
  console.error;
}
