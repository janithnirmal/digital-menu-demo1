function contentChanger(navigation) {
  let container = document.getElementById("adminContentContainer");

  fetch("templates/" + navigation + ".php")
    .then((res) => res.text())
    .then((data) => {
      container.innerHTML = data;
    })
    .then((err) => console.log(err));
}

function signIn() {
  let mobile = document.getElementById("mobile").value;
  let password = document.getElementById("password").value;

  fetch("api/signInProcess.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body:
      "signInData=" +
      JSON.stringify({
        slmobile: mobile,
        password: password,
      }),
  })
    .then((res) => res.text())
    .then((data) => {
      alert(data);
      window.location = "adminPanel.php";
    })
    .then((err) => console.log(err));
}

// // test
// let age = 21;
// let name = "janith";

// let UI = `<div className="col-12 p-0">
// <div className="row m-0">
// <button class="btn btn-primary">${name}</button>
// </div>
// </div>`;

// document.body.innerHTML = UI;
