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

function logOutAdmin() {
  fetch("api/signOutProcess.php") //our request file
  .then(response => response.text()) //then now check response == text
  .then(data => {     //data arrow function
    if (data === 'log out') {  //data == 'our signOutProcess.php' response text
      window.location.reload(); //then reload signIn.php
    }else{
      console.log('Unexpected response:', data);  //error handaling (Unexpected response)
    }
  })
  .catch(error => {
    console.error('Error:', error); //error handaling
  })
}

// test
// let age = 21;
// let name = "janith";

// let UI = `<div className="col-12 p-0">
// <div className="row m-0">
// <button class="btn btn-primary">${name}</button>
// </div>
// </div>`;

// document.body.innerHTML = UI;
