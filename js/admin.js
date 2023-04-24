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
      } else {
        console.log('Unexpected response:', data);  //error handaling (Unexpected response)
      }
    })
    .catch(error => {
      console.error('Error:', error); //error handaling
    })
}
// product Adding Process
function AddNewProductSave() {
  let productName = document.getElementById("productName").value;
  let productPrice = document.getElementById("productPrice").value;
  let CategoryId = document.getElementById("category").value;

  fetch("api/productAddProcess.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body:
      "productDetail=" +
      JSON.stringify({
        productName: productName,
        priceDouble: productPrice,
        productCategoryID: CategoryId,
      }),
  })
    .then(response => response.text()) //then now check response == text
    .then(data => {
      if (data === 'success') {
        alert("Product Adding Success");
      } else {
        console.log('Unexpected response:', data);  //error handaling (Unexpected response)
      }
    })
    .catch(error => {
      console.error('Error:', error); //error handaling
    })
}
// add New Category
function addNewCategory() {
  let categoryName = document.getElementById("categoryName").value;
  let categoryImage = document.getElementById("categoryImage").files[0];

  // new formData
  const formData = new FormData();

  // Append the image file to the formData object
  formData.append('categoryName', JSON.stringify({ category: categoryName }));
  formData.append('categoryImage', categoryImage);

  // Send the FormData object to the server using an AJAX request
  fetch('api/categoryAddProcess.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.text()) //then now check response == text
    .then(data => {
      if (data === 'success') {
        alert("Category Adding Success");
      } else {
        console.log('Unexpected response:', data);  //error handaling (Unexpected response)
         alert(data);
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
